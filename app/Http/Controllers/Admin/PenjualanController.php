<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportController;
use App\Http\Requests\DataPemilihCreateRequest;
use App\Repositories\Interfaces\PenjualanInterface;
use App\Http\Resources\Penjualan\PenjualanAllResource;
use App\Http\Requests\Penjualan\CreatePenjualanRequest;
use App\Http\Requests\Penjualan\UpdatePenjualanRequest;
use App\Models\data_pemilih;
use Exception;

class PenjualanController extends Controller
{
    //
    private $PenjualanInterface, $model;

    public function __construct(PenjualanInterface $PenjualanInterface)
    {
        $this->PenjualanInterface = $PenjualanInterface;
        $this->model = new data_pemilih;

    }

    public function index()
    {
        $tahunSekarang = Carbon::now()->format('Y');
        $bulanSekarang = Carbon::now()->locale('id')->isoFormat('MMMM');
        $bulan = config('services.bulan');
        $data = $this->PenjualanInterface->getAll(50);
        $appendsPaginate = $this->PenjualanInterface->appendsPaginate();
        $countAll = $this->PenjualanInterface->countAll();
        $desa = $this->PenjualanInterface->desa();
        $kecamatan=         $this->PenjualanInterface->kecamatan();
        $countWhereKec = $this->PenjualanInterface->countAllWhereKec();
        // $countWhereMonth = $this->PenjualanInterface->countWhereMonth();
        // $countNotPay = $this->PenjualanInterface->countNotPay();
        return view("admin.penjualan.index", compact("tahunSekarang", "bulanSekarang", "bulan",  "data", "appendsPaginate", "countAll", "desa","kecamatan", "countWhereKec"));
    }

    public function create()
    {
        $desa = $this->PenjualanInterface->desa();
        $kecamatan = $this->PenjualanInterface->kecamatan();
        return view('admin.penjualan.create', compact('desa', 'kecamatan'));
    }

    public function simpan(DataPemilihCreateRequest $request)
    {

        try {
            $cekUnique = $this->model->where('kecamatan', $request->kecamatan)->where('desa', $request->desa)->where('tps', $request->tps)->count();
            if ($cekUnique > 0) {
                return redirect()->back()->with('toast_success', 'Data tps ' . $request->tps . ' Desa ' . $request->desa . ' sudah ada ');
            }
            $save = $this->model->create([
                'desa' => $request->desa,
                'tps' => $request->tps,
                'jumlah_pemilih' => $request->total_suara,
                'kecamatan' => $request->kecamatan,
                'saksi' => $request->saksi
            ]);

            if ($save) {
                return redirect(route('penjualan'))->with('toast_success', 'berhasil Menambah data');

            }
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Gagal Menambah data');
        }
    }

    public function edit(data_pemilih $id)
    {
        $data = $id;
        $desa = $this->PenjualanInterface->desa();
        $kecamatan = $this->PenjualanInterface->kecamatan();

        return view('admin.penjualan.update', compact('data', 'desa', 'kecamatan'));
    }

    public function update(DataPemilihCreateRequest $request, data_pemilih $id)
    {
        try {

            $cekUnique = $this->model->where('kecamatan', $request->kecamatan)->where('desa', $request->desa)->where('tps', $request->tps)->whereNotIn('id', [$id->id])->count();
            if ($cekUnique > 0) {
                return redirect()->back()->with('toast_success', 'Data tps ' . $request->tps . ' Desa ' . $request->desa . ' sudah ada ');
            }
            $up = $id->update([
                'desa' => $request->desa,
                'tps' => $request->tps,
                'jumlah_pemilih' => $request->total_suara,
                'kecamatan' => $request->kecamatan,
                'saksi' => $request->saksi
            ]);
            if ($up) {
                return redirect(route('penjualan'))->with('toast_success', 'berhasil Memperbarui data');

            }
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Gagal Mengupdate data');

        }

    }

    public function delete(data_pemilih $id){
        $id->delete();
        return redirect()->back()->with('toast_success', 'data berhasil dihapus');
    }




}

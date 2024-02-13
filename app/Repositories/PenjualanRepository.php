<?php
namespace App\Repositories;

use Exception;
use App\Models\Penjualan;
use App\Repositories\Interfaces\PenjualanInterface;
use App\Http\Resources\Penjualan\PenjualanAllResource;
use App\Models\data_pemilih;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;


class PenjualanRepository implements PenjualanInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new data_pemilih();
    }

    public function numberFormatCountTransaksi($data)
    {
        return number_format($data, 0, ',', '.');
    }
    public function countAll()
    {

        $data = $this->model->sum('jumlah_pemilih');
        return $this->numberFormatCountTransaksi($data);
    }

    public function countAllWhereKec()
    {
        if (request('kecamatan')) {
            $sum = $this->model->where('kecamatan', request('kecamatan'))->sum('jumlah_pemilih');
            return $this->numberFormatCountTransaksi($sum);
        }else{
            return null;
        }

    }
    public function desa()
    {
        return $data = [
            'blumbang',
            'brumbun',
            'duriwetan',
            'gedangan',
            'gumantuk',
            'jangkungsomo',
            'kanugrahan',
            'klagensrampat',
            'maduran',
            'ngayung',
            'pangean',
            'pangkatrejo',
            'parengan',
            'pringgoboyo',
            'siwuran',
            'taji',
            'turi',
            'besur',
            'bugel',
            'bulutengger',
            'jugo',
            'karang',
            'kebalan kulon',
            'kembangan',
            'kendal',
            'keting',
            'kudikan',
            'latek',
            'manyar',
            'miru',
            'moro',
            'ngarum',
            'porodeso',
            'sekaran',
            'siman',
            'sungegeneng',
            'titik',
            'trosono',
            'bojoasri',
            'blajo',
            'butungan',
            'canditunggal',
            'cluring',
            'dibe',
            'gambuhan',
            'jelakcatur',
            'kalitengah',
            'kediren',
            'kuluran',
            'lukrejo',
            'mungli',
            'pengangsalan',
            'pucangro',
            'pucangtelu',
            'somosari',
            'sugihwaras',
            'tiwet',
            'tunjungmekar',
            'balungtawun',
            'bandungsari',
            'banjarejo',
            'baturono',
            'gedangan',
            'kadungrembug',
            'kebonsari',
            'madulegi',
            'menongo',
            'pajangan',
            'plumpang',
            'sidogembul',
            'siwalanrejo',
            'sugihrejo',
            'sukodadi',
            'sukolilo',
            'sumberagung',
            'sumberaji',
            'surabayan',
            'tlogorejo',
            'badurame',
            'balun',
            'bambang',
            'gedongboyountung',
            'geger',
            'karangwedoro',
            'keben',
            'kemlaggi lor',
            'kemlagigede',
            'kepudibener',
            'ngujungrejo',
            'pomahanjanggan',
            'putatkumpul',
            'sukoanyar',
            'sukorejo',
            'tambakploso',
            'tawangrejo',
            'turi',
            'wangunrejo',
            'banjarmadu',
            'bantengputih',
            'guci',
            'jagran',
            'kalanganyar',
            'kaligerman',
            'karanggeneng',
            'karangrejo',
            'karangwungu',
            'kawistolegi',
            'kendalkemlagi',
            'latukan',
            'mertani',
            'prijekngablag',
            'sonoadi',
            'sumberwudi',
            'sungelebak',
            'tracal',
            'lainya'



        ];
    }

    public function kecamatan()
    {
        return $data = [
            'maduran',
            'sekaran',
            'kalitengah',
            'sukodadi',
            'turi',
            'karanggeneng'


        ];
    }

    
    public function appendsPaginate()
    {
        $appendsPaginate = [
            'desa' => request('desa'),
            'kecamatan' => request('tahun'),

        ];
        return $appendsPaginate;
    }
    public function getAll($paginate)
    {
        $data = $this->model->latest();
        if (request('desa')) {
            $data->where('desa', request('desa'));
        }

        if (request('kecamatan')) {
            $sum = $this->model->where('kecamatan', request('kecamatan'))->sum('jumlah_pemilih');
            $data->where('kecamatan', request('kecamatan'));
        }

        if ($paginate > 0) {
            $data->paginate($paginate);
        } else {
            $data;
        }
        return $data->paginate($paginate);

    }

    public function show($data)
    {
        return PenjualanAllResource::make($data);
    }


}
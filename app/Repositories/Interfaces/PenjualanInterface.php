<?php
namespace App\Repositories\Interfaces;

interface PenjualanInterface{
    public function getAll($paginate);
    public function appendsPaginate();
    public function show($data);
    public function countAll();
    public function desa();
    public function kecamatan();
    public function countAllWhereKec();

    // public function countWhereYear();
    // public function countWhereMonth();
    // public function countNotPay();
}
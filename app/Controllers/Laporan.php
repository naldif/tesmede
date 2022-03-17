<?php

namespace App\Controllers;
use App\Models\KomoditasModel;
use App\Models\ProduksiModel;

class Laporan extends BaseController
{
    function __construct()
    {
        $this->komoditas = new KomoditasModel();
        $this->produksi = new ProduksiModel();
    }

    public function index()
    {
        $data['active_menu'] = 'laporan';
        // $data['produksi'] = $this->produksi->findAll();
        // $data['produksi'] = $this->produksi->listLaporan()->getResult();
        $data['lapor'] = $this->produksi->listLaporan()->getResult();
        $data['tahun'] = $this->produksi->getTahun()->getResult();
        return view('laporan/index', $data);
    }
}
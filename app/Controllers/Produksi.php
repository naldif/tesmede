<?php

namespace App\Controllers;
use App\Models\KomoditasModel;
use App\Models\ProduksiModel;

class Produksi extends BaseController
{

    function __construct()
    {
        $this->komoditas = new KomoditasModel();
        $this->produksi = new ProduksiModel();
    }

    public function index()
    {
        $data['active_menu'] = 'produksi';
        // $data['produksi'] = $this->produksi->findAll();
        $data['produksi'] = $this->produksi->listProduksi()->getResult();
        return view('produksi/index', $data);
    }

    public function create()
    {
        $data['active_menu'] = 'produksi';
        $data['komo'] = $this->komoditas->findAll();
        return view('produksi/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required|is_unique[produksi.tanggal]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => '{field} Tidak boleh sama'
                    
                ]
            ],
            'komoditas_kode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    // 'is_unique' => '{field} Tidak boleh sama'
                ]
            ],
            'produksi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'numeric' => '{field} Harus numeric'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->produksi->insert([
            'tanggal' => $this->request->getVar('tanggal'),
            'komoditas_kode' => $this->request->getVar('komoditas_kode'),
            'produksi' => $this->request->getVar('produksi'),
         
        ]);
      
        session()->setFlashdata('message', 'Tambah Data Komoditas Berhasil');
        return redirect()->to('/produksi');
    }

    function edit($id)
    {
        $dataProduksi = $this->produksi->find($id);
        $dataKomo = $this->komoditas->findAll();
        // $dataKomo = $this->produksi->listProduksi()->getResult();
        if (empty($dataProduksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produksi Tidak ditemukan !');
        }
        $data['produk'] = $dataProduksi;
        $data['komo'] = $dataKomo;
        $data['active_menu'] = 'produksi';
        return view('produksi/edit', $data);
    }

    public function update($id)
    {
        // if (!$this->validate([
           
        // ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return redirect()->back();
        // }
 
        $this->produksi->update($id, [
            'tanggal' => $this->request->getVar('tanggal'),
            'komoditas_kode' => $this->request->getVar('komoditas_kode'),
            'produksi' => $this->request->getVar('produksi'),
           
        ]);
        session()->setFlashdata('message', 'Update Data Komoditas Berhasil');
        return redirect()->to('/produksi');
    }

    function delete($id)
    {
        $dataProduksi = $this->produksi->find($id);
        if (empty($dataProduksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produksi Tidak ditemukan !');
        }
        $this->produksi->delete($id);
        session()->setFlashdata('message', 'Delete Data Produksi Berhasil');
        return redirect()->to('/produksi');
    }

    function detail($id)
    {
        $dataProduksi = $this->produksi->find($id);
        $dataKomo = $this->komoditas->findAll();
        if (empty($dataProduksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produksi Tidak ditemukan !');
        }
        $data['produk'] = $dataProduksi;
        $data['komo'] = $dataKomo;
        $data['active_menu'] = 'produksi';
        return view('produksi/detail', $data);
    }

}
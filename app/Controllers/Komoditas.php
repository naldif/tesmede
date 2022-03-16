<?php

namespace App\Controllers;
use App\Models\KomoditasModel;

class Komoditas extends BaseController
{

    function __construct()
    {
        $this->komoditas = new KomoditasModel();
    }

    public function index()
    {
        $data['active_menu'] = 'komoditas';
        $data['komoditas'] = $this->komoditas->findAll();
        return view('komoditas/index', $data);
    }

    public function create()
    {
        $cek = $this->komoditas->cekkode();

        $a = 'K';
        $b = '00';
        $nourut = substr($cek, 2, 3);
        $kode_komo = $nourut + 1;
        
        $kodes = $a . $b. $kode_komo;
        // $data['no_komo'] = $this->komoditas->nokode();
        $data = array(
            'no_komo' => $kodes,
            'active_menu' => 'produksi'
        );
      
        return view('komoditas/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'komoditas_kode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                    
                ]
            ],
            'komoditas_nama' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Panjang karakter tidak boleh lebih dari 10'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->komoditas->insert([
            'komoditas_kode' => $this->request->getVar('komoditas_kode'),
            'komoditas_nama' => $this->request->getVar('komoditas_nama'),
         
        ]);
        session()->setFlashdata('message', 'Tambah Data Komoditas Berhasil');
        return redirect()->to('/komoditas');
    }

    function edit($id)
    {
        $dataKomoditas = $this->komoditas->find($id);
        if (empty($dataKomoditas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Komoditas Tidak ditemukan !');
        }
        $data['komo'] = $dataKomoditas;
        $data['active_menu'] = 'komoditas';
        return view('komoditas/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'komoditas_kode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                    
                ]
            ],
            'komoditas_nama' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Panjang karakter tidak boleh lebih dari 10'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->komoditas->update($id, [
            'komoditas_kode' => $this->request->getVar('komoditas_kode'),
            'komoditas_nama' => $this->request->getVar('komoditas_nama'),
           
        ]);
        session()->setFlashdata('message', 'Update Data Komoditas Berhasil');
        return redirect()->to('/komoditas');
    }

    function delete($id)
    {
        $dataKomoditas = $this->komoditas->find($id);
        if (empty($dataKomoditas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Komoditas Tidak ditemukan !');
        }
        $this->komoditas->delete($id);
        session()->setFlashdata('message', 'Delete Data Komoditas Berhasil');
        return redirect()->to('/komoditas');
    }

    function detail($id)
    {
        $dataKomoditas = $this->komoditas->find($id);
        if (empty($dataKomoditas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Komoditas Tidak ditemukan !');
        }
        $data['komo'] = $dataKomoditas;
        $data['active_menu'] = 'komoditas';
        return view('komoditas/detail', $data);
    }

}
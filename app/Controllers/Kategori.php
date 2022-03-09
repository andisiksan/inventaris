<?php

namespace App\Controllers;

use App\Models\BarangModels;
use App\Models\KategoriModel;
use App\Models\StatusModel;
use Config\Validation;

class Kategori extends BaseController
{
    protected $barangmodels;
    protected $statusmodel;
    protected $kategorimodel;

    public function __construct()
    {
        $this->barangmodels = new BarangModels();
        $this->statusmodel = new StatusModel();
        $this->kategorimodel = new KategoriModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $this->kategorimodel->findAll(),
            'var' => 'kategori'
        ];

        return view('kategori/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'var' => 'kategori',
            'validation' => \Config\Services::validation()

        ];



        return view('kategori/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama_kategori' => [
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori Tidak Boleh Kosong'
                ]
            ],
            'warna' => [
                'label' => 'Warna',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna Kategori Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to('/kategori/create')->withInput();
        }

        if ($this->kategorimodel->save([
            'nama_kategori' => $this->request->getVar("nama_kategori"),
            'warna' => $this->request->getVar("warna")
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to('/kategori');
        } else {
            echo 'gagal';
        }
    }


    public function delete($id_kategori)
    {
        $this->kategorimodel->delete($id_kategori);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/kategori');
    }


    public function edit($id_barang)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->barangmodels->detailBarang($id_barang),
            'kategori' => $this->kategorimodel->findAll(),
            'status' => $this->statusmodel->findAll(),
            'var' => 'barang'
        ];

        return view('barang/edit', $data);
    }

    public function update()
    {
        // ambil gambar
        $fileimage = $this->request->getFile("image");


        if ($fileimage->getFilename() != "") {
            // pindahkan file
            $fileimage->move('img');

            // ambil nama file
            $namaimage = $fileimage->getName();
        } else {

            $namaimage = $this->request->getVar('img_tetap');
        }


        if ($this->barangmodels->save([
            'id_barang' => $this->request->getVar("id_barang"),
            'nama_barang' => $this->request->getVar("nama_barang"),
            'jumlah' => $this->request->getVar("jumlah"),
            'kategori' => $this->request->getVar("kategori"),
            'id_status' => $this->request->getVar("status"),
            'image' => $namaimage,
            'keterangan' => $this->request->getVar("keterangan")
        ])) {
            if ($namaimage != $this->request->getVar("img_tetap")) {
                unlink('img/' . $this->request->getVar("img_tetap"));
            }
            session()->setFlashdata('pesan', 'Data Berhasil Di Update.');
            return redirect()->to('/barang');
        } else {
            echo 'gagal';
        }
    }
}

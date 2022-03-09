<?php

namespace App\Controllers;

use App\Models\BarangModels;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class Barang extends BaseController
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
            'title' => 'Data Barang',
            'barang' => $this->barangmodels->getBarang(),
            'var' => 'barang'
        ];




        return view('barang/list', $data);
    }

    public function kondisi($id)
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barangmodels->getBrg($id),
            'var' => 'kondisi_barang'
        ];

        return view('barang/list', $data);
    }


    public function detail($id_barang)

    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangmodels->detailBarang($id_barang),
            'var' => 'barang'
        ];



        return view('barang/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
            'status' => $this->statusmodel->findAll(),
            'kategori' => $this->kategorimodel->findAll(),
            'var' => 'barang'

        ];

        return view('barang/create', $data);
    }

    public function save()
    {
        // ambil gambar
        $fileimage = $this->request->getFile("image");

        // ambil nama
        $namaimage = $fileimage->getRandomName();


        // pindahkan file
        $fileimage->move('img', $namaimage);

        // ambil nama file
        // $namaimage = $fileimage->getName();

        if ($this->barangmodels->save([
            'nama_barang' => $this->request->getVar("nama_barang"),
            'jumlah' => $this->request->getVar('jumlah'),
            'id_kategori' => $this->request->getVar("kategori"),
            'id_status' => $this->request->getVar("status"),
            'image' => $namaimage,
            'keterangan' => $this->request->getVar("keterangan")
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to('/barang');
        } else {
            echo 'gagal';
        }
    }


    public function delete($id_barang)
    {


        // cari gambar berdasarkan id
        $data = $this->barangmodels->detailBarang($id_barang);
        // hapus gambar berdasarkan id
        unlink('img/' . $data['image']);
        $this->barangmodels->delete($id_barang);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/barang');
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

            'id_kategori' => $this->request->getVar("kategori"),
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

<?php

namespace App\Controllers;

use App\Models\BarangModels;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class Home extends BaseController
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
        $kategori = $this->kategorimodel->findAll();
        $jumlahbarang = $this->barangmodels->findAll();
        // dd(count($jumlahbarang));


        $a = 0;
        foreach ($kategori as $row) {

            $totaljumlahkategori[$a] = [
                'namaKategori' => $row['nama_kategori'],
                'jumlah' => count($this->barangmodels->getKategoriBarang($row['id_kategori'])),
                'warna' => $row['warna']

            ];
            $a++;
        }
        // dd($kategori);

        $data = [
            'title' => 'Dashboard',
            'var' => 'home',
            'kategori' => $totaljumlahkategori,
            'jumlah' => count($jumlahbarang)
        ];


        return view('dashboard', $data);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModels extends Model
{
    protected $table = 'table_barang';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['kategori', 'nama_barang', 'id_status', 'keterangan', 'image', 'id_kategori'];


    public function getBarang()
    {
        return $this

            ->join('table_status', 'table_status.id_status  = table_barang.id_status')
            ->join('table_kategori', 'table_kategori.id_kategori = table_barang.id_kategori')
            ->findAll();
    }

    // public function getBaik()
    // {
    //     return $this
    //         ->join('table_status', 'table_status.id_status = table_barang.id_status')
    //         ->where('table_status.id_status', 1)
    //         ->countAllResults();
    // }

    public function getBrg($id)
    {
        return $this
            ->join('table_status', 'table_status.id_status = table_barang.id_status')
            ->join('table_kategori', 'table_kategori.id_kategori = table_barang.id_kategori')
            ->where('table_status.id_status', $id)
            ->findAll();
    }

    // public function getRusak()
    // {
    //     return $this
    //         ->join('table_status', 'table_status.id_status = table_barang.id_status')
    //         ->where('table_status.id_status', 2)
    //         ->countAllResults();
    // }

    public function detailBarang($id_barang)
    {
        return $this

            ->join('table_status', 'table_status.id_status = table_barang.id_status')
            ->join('table_kategori', 'table_kategori.id_kategori = table_barang.id_kategori')
            ->where(['id_barang' => $id_barang])->first();
    }

    public function getKategoriBarang($id_kategori)
    {
        return $this

            ->join('table_kategori', 'table_kategori.id_kategori = table_barang.id_kategori')
            ->where(['table_barang.id_kategori' => $id_kategori])->findall();
    }
}

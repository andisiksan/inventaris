<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'table_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'warna'];


    public function getKategori()
    {
        return $this

            ->join('table_status', 'table_status.id_status = table_barang.id_status')
            ->findAll();
    }
}

<?php

namespace app\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori_produk';
    protected $primaryKey       = 'id_kategori';
    protected $returnType       = 'object'; // Berbasis OOP
    protected $allowedFields    = ['nama_kategori','slug_kategori']; //Kolom yang mau di isi


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
}

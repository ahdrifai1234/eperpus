<?php
namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model {
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['isbn', 'judul', 'penulis', 'tahun', 'stok'];
}
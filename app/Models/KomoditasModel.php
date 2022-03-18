<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class KomoditasModel extends Model
{
    protected $table = "komoditas";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'komoditas_kode', 'komoditas_nama', 'create_at'];


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(komoditas_kode) as komoditas_kode from komoditas");
        $hasil = $query->getRow();
        return $hasil->komoditas_kode;
    }


}
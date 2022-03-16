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

    public function nokode()
    {
        $builder = $this->db->table('komoditas');
        $builder->select('komoditas.*, komoditas_kode,1 as kode_komoditas');
        $builder->orderBy('komoditas.komoditas_kode', 'desc');
    
        $query =  $builder->get();

        if ($query->getNumRows() <> 0 ) {
            //cek kode jika telah tersedia  
            $data = $query->getRow();
            $kode = intval($data->kode_komoditas) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $a = 'K';
        $b = '0';
       
        $kodes = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $no_komoditas = $a . $b . $kodes ;
        return $no_komoditas;
    }
}
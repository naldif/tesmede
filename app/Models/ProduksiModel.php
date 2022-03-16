<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class produksiModel extends Model
{
    protected $table = "produksi";
    protected $primaryKey = "id";
    protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'komoditas_kode', 'produksi', 'tanggal'];


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function listProduksi($id = false)
    {
        if($id === false){
            $builder = $this->db->table('produksi');
            $builder->select('produksi.*, komoditas.komoditas_nama');
            $builder->join('komoditas','komoditas.id = produksi.komoditas_kode');
            
            return $builder->get();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }

    // public function getLaporan()
    // {
    //     $builder = $this->db->table('produksi');
    //     $builder->select("COUNT(produksi) as komo, MONTH(tanggal) as month");
    //     $builder->groupBy("MONTH(tanggal), komoditas_kode");
    //     $builder->where('YEAR(tanggal)', date('Y'));
    //     // $builder->where('MONTH(tanggal)', date('m'));
    //     return $builder->get();
  
    // }
}
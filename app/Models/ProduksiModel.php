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

    public function listLaporan()
    {
        $builder = $this->db->table('produksi');
        $builder->select('produksi.*, komoditas.komoditas_nama, SUM(produksi) as total');
        $builder->join('komoditas','komoditas.id = produksi.komoditas_kode');
        $builder->groupBy("komoditas_kode, MONTH(tanggal)");
      
        

        return $builder->get();
    }

}
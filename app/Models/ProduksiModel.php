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
        $builder = $this->db->table('view_rekap_laporan');
        $builder->select('tahun, komoditas_nama, 
        SUM( IF( MONTH(tanggal) = 1, produksi, 0) ) AS januari, 
        SUM( IF( MONTH(tanggal) = 2, produksi, 0) ) AS februari, 
        SUM( IF( MONTH(tanggal) = 3, produksi, 0) ) AS maret, 
        SUM( IF( MONTH(tanggal) = 4, produksi, 0) ) AS april, 
        SUM( IF( MONTH(tanggal) = 5, produksi, 0) ) AS mei, 
        SUM( IF( MONTH(tanggal) = 6, produksi, 0) ) AS juni, 
        SUM( IF( MONTH(tanggal) = 7, produksi, 0) ) AS juli, 
        SUM( IF( MONTH(tanggal) = 8, produksi, 0) ) AS agustus, 
        SUM( IF( MONTH(tanggal) = 9, produksi, 0) ) AS september, 
        SUM( IF( MONTH(tanggal) = 10, produksi, 0) ) AS oktober, 
        SUM( IF( MONTH(tanggal) = 11, produksi, 0) ) AS november, 
        SUM( IF( MONTH(tanggal) = 12, produksi, 0) ) AS desember, 
        SUM(produksi) as total
        ');

        $builder->groupBy("komoditas_nama, YEAR(tanggal)");
        // $builder->where('YEAR(tanggal)', date('Y'));

        return $builder->get();
    }

    public function getTahun()
    {
        $builder = $this->db->table('view_rekap_laporan');
        $builder->select('YEAR(tanggal) as tahun');
        $builder->orderBy('YEAR(tanggal)');
        $builder->groupBy('YEAR(tanggal)');
        return $builder->get();
    }

}
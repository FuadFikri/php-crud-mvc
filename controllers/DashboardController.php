<?php
require_once 'config/Database.php';


class DashboardController {
    private $conn;


    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->conn = $db;
    }

    
    public function index() {
        $keuntungan = $this->getKeuntungan();
        $total_penjualan = $this->getTotalPenjualan();
        $laba_rugi = $this->getLabaRugi();
        include_once 'views/dashboard/index.php';
    }

    private function getKeuntungan() {
        $query = 'select ifnull(sum(total_harga_jual - total_harga_beli), 0) as total_keuntungan from
                (SELECT
                j.id_barang,
                harga_jual, jumlah_penjualan,
                harga_jual * jumlah_penjualan as total_harga_jual,
                b.harga_beli, j.jumlah_penjualan * b.harga_beli as total_harga_beli
                FROM penjualan j
                left join pembelian b on j.id_barang = b.id_barang
                ) as x';  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();      
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    private function getTotalPenjualan() {
        $query = 'select ifnull(sum(harga_jual), 0) as total_harga_jual from penjualan';  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();      
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function getLabaRugi() {
        $query = 'with penjualan as (
                    select id_barang, sum(jumlah_penjualan) as jumlah_penjualan, sum(penjualan) total_penjualan from
                    (SELECT id_barang, jumlah_penjualan, harga_jual, jumlah_penjualan * harga_jual as penjualan FROM penjualan) as x 
                    group by id_barang),

                    pembelian as (
                    select id_barang, sum(jumlah_pembelian) as jumlah_pembelian, sum(pembelian) as total_pembelian 
                    from (SELECT id_barang, jumlah_pembelian, jumlah_pembelian* harga_beli as pembelian FROM pembelian) as x
                    group by id_barang)

                    select ba.id_barang, nama_barang, 
                    b.jumlah_pembelian, b.total_pembelian,
                    j.jumlah_penjualan, j.total_penjualan,
                    j.total_penjualan - b.total_pembelian as selisih
                    from barang ba
                    left join penjualan j on ba.id_barang = j.id_barang
                    left join pembelian b on ba.id_barang = b.id_barang';
                    $stmt = $this->conn->prepare($query);   
                    $stmt->execute();
                    return $stmt;
    }


}
?>

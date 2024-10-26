<?php
class Penjualan {
    private $conn;
    private $table = 'penjualan';

    public $id_penjualan;
    public $jumlah_penjualan;
    public $harga_jual;
    public $id_pengguna;
    public $id_pelanggan;
    public $id_barang;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPenjualan() {
        $query = "
            SELECT 
                p.id_penjualan, 
                p.jumlah_penjualan, 
                p.harga_jual,
                u.nama_depan AS nama_depan,
                u.nama_belakang AS nama_belakang,
                b.nama_barang AS nama_barang,
                pe.nama_pelanggan AS nama_pelanggan
            FROM 
                penjualan p
            JOIN 
                pengguna u ON p.id_pengguna = u.id_pengguna
            JOIN 
                barang b ON p.id_barang = b.id_barang
            JOIN 
                pelanggan pe ON p.id_pelanggan = pe.id_pelanggan
            ORDER BY p.id_penjualan
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (id_penjualan, jumlah_penjualan, harga_jual, id_pengguna, id_pelanggan, id_barang) VALUES (:id_penjualan, :jumlah_penjualan, :harga_jual, :id_pengguna, :id_pelanggan, :id_barang)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id_penjualan', $this->id_penjualan);
        $stmt->bindParam(':jumlah_penjualan', $this->jumlah_penjualan);
        $stmt->bindParam(':harga_jual', $this->harga_jual);
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        $stmt->bindParam(':id_pelanggan', $this->id_pelanggan);
        $stmt->bindParam(':id_barang', $this->id_barang);
    
        if($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET jumlah_penjualan = :jumlah_penjualan, harga_jual = :harga_jual, id_pengguna = :id_pengguna, id_barang = :id_barang, id_pelanggan = :id_pelanggan WHERE id_penjualan = :id_penjualan';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_penjualan', $this->id_penjualan);
        $stmt->bindParam(':jumlah_penjualan', $this->jumlah_penjualan);
        $stmt->bindParam(':harga_jual', $this->harga_jual);
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        $stmt->bindParam(':id_barang', $this->id_barang);
        $stmt->bindParam(':id_pelanggan', $this->id_pelanggan);

        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_penjualan = :id_penjualan';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_penjualan', $this->id_penjualan);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function findById() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_penjualan = :id_penjualan';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_penjualan', $this->id_penjualan);
        $stmt->execute();     

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

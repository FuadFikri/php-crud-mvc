<?php
class Pembelian {
    private $conn;
    private $table = 'pembelian';

    public $id_pembelian;
    public $jumlah_pembelian;
    public $harga_beli;
    public $id_pengguna;
    public $id_barang;
    public $id_supplier;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPembelian() {
        $query = "
            SELECT 
                p.id_pembelian, 
                p.jumlah_pembelian, 
                p.harga_beli,
                u.nama_depan AS nama_depan,
                u.nama_belakang AS nama_belakang,
                b.nama_barang AS nama_barang,
                s.nama_supplier AS nama_supplier
            FROM 
                pembelian p
            JOIN 
                pengguna u ON p.id_pengguna = u.id_pengguna
            JOIN 
                barang b ON p.id_barang = b.id_barang
            JOIN 
                supplier s ON p.id_supplier = s.id_supplier
            ORDER BY p.id_pembelian
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (id_pengguna, id_barang, id_supplier, jumlah_pembelian, harga_beli) VALUES (:id_pengguna, :id_barang, :id_supplier, :jumlah_pembelian, :harga_beli)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        $stmt->bindParam(':id_barang', $this->id_barang);
        $stmt->bindParam(':id_supplier', $this->id_supplier);
        $stmt->bindParam(':jumlah_pembelian', $this->jumlah_pembelian);
        $stmt->bindParam(':harga_beli', $this->harga_beli);
    
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET jumlah_pembelian = :jumlah_pembelian, harga_beli = :harga_beli, id_pengguna = :id_pengguna, id_barang = :id_barang, id_supplier = :id_supplier WHERE id_pembelian = :id_pembelian';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_pembelian', $this->id_pembelian);
        $stmt->bindParam(':jumlah_pembelian', $this->jumlah_pembelian);
        $stmt->bindParam(':harga_beli', $this->harga_beli);
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        $stmt->bindParam(':id_barang', $this->id_barang);
        $stmt->bindParam(':id_supplier', $this->id_supplier);

        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_pembelian = :id_pembelian';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_pembelian', $this->id_pembelian);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function findById() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pembelian = :id_pembelian';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_pembelian', $this->id_pembelian);
        $stmt->execute();     

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

<?php
class Barang {
    private $conn;
    private $table = 'barang';

    public $id_barang;
    public $nama_barang;
    public $keterangan;
    public $satuan;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cek_jumlah_barang() { 
        echo''. $this->id_barang .'';
    }

    
    public function getbarangs() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (nama_barang, keterangan, satuan) VALUES (:nama_barang, :keterangan, :satuan)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_barang', $this->nama_barang);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':satuan', $this->satuan);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET nama_barang = :nama_barang, keterangan = :keterangan, satuan = :satuan WHERE id_barang = :id_barang';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_barang', $this->id_barang);
        $stmt->bindParam(':nama_barang', $this->nama_barang);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':satuan', $this->satuan);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_barang = :id_barang';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_barang', $this->id_barang);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function findById() {
        
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_barang = :id_barang';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_barang', $this->id_barang);
            $stmt->execute();      
            return $stmt->fetch(PDO::FETCH_ASSOC);
           
    }
       
}
?>

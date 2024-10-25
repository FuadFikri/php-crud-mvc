<?php
class Pelanggan {
    private $conn;
    private $table = 'pelanggan';

    public $id_pelanggan;
    public $nama_pelanggan;
    public $alamat_pelanggan;
    public $email_pelanggan;
    public $no_telp_pelanggan;
    public $keterangan;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getpelanggans() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (nama_pelanggan, alamat_pelanggan, email_pelanggan, no_telp_pelanggan, keterangan) VALUES (:nama_pelanggan, :alamat_pelanggan, :email_pelanggan, :no_telp_pelanggan, :keterangan)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_pelanggan', $this->nama_pelanggan);
        $stmt->bindParam(':alamat_pelanggan', $this->alamat_pelanggan);
        $stmt->bindParam(':email_pelanggan', $this->email_pelanggan);
        $stmt->bindParam(':no_telp_pelanggan', $this->no_telp_pelanggan);
        $stmt->bindParam(':keterangan', $this->keterangan);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET nama_pelanggan = :nama_pelanggan, alamat_pelanggan = :alamat_pelanggan, email_pelanggan = :email_pelanggan, no_telp_pelanggan = :no_telp_pelanggan,  keterangan = :keterangan WHERE id_pelanggan = :id_pelanggan';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_pelanggan', $this->nama_pelanggan);
        $stmt->bindParam(':alamat_pelanggan', $this->alamat_pelanggan);
        $stmt->bindParam(':email_pelanggan', $this->email_pelanggan);
        $stmt->bindParam(':no_telp_pelanggan', $this->no_telp_pelanggan);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':id_pelanggan', $this->id_pelanggan);
        if($stmt->execute()) {
            return true;
        } else {
            // Output error information for debugging
            print_r($stmt->errorInfo());
            return false;
        }
    }

  
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_pelanggan = :id_pelanggan';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_pelanggan', $this->id_pelanggan);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function findById() {
        
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pelanggan = :id_pelanggan';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pelanggan', $this->id_pelanggan);
            $stmt->execute();      
            return $stmt->fetch(PDO::FETCH_ASSOC);
           
    }
       
}
?>

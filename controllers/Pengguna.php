<?php
class Pengguna {
    private $conn;
    private $table = 'pengguna';

    public $id_pengguna;
    public $nama_pengguna;
    public $password;
    public $nama_depan;
    public $nama_belakang;
    public $no_hp;
    public $alamat;
    public $id_akses;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getPenggunas() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (nama_pengguna, password, nama_depan, nama_belakang, no_hp, alamat, id_akses) VALUES (:nama_pengguna, :password, :nama_depan, :nama_belakang, :no_hp, :alamat, :id_akses)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_pengguna', $this->nama_pengguna);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':nama_depan', $this->nama_depan);
        $stmt->bindParam(':nama_belakang', $this->nama_belakang);
        $stmt->bindParam(':no_hp', $this->no_hp);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':id_akses', $this->id_akses);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET nama_pengguna = :nama_pengguna, password = :password, nama_depan = :nama_depan, nama_belakang = :nama_belakang,  no_hp = :no_hp, alamat = :alamat, id_akses = :id_akses WHERE id_pengguna = :id_pengguna';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_pengguna', $this->nama_pengguna);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':nama_depan', $this->nama_depan);
        $stmt->bindParam(':nama_belakang', $this->nama_belakang);
        $stmt->bindParam(':no_hp', $this->no_hp);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':id_akses', $this->id_akses);
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        if($stmt->execute()) {
            return true;
        } else {
            // Output error information for debugging
            print_r($stmt->errorInfo());
            return false;
        }
    }

  
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_pengguna = :id_pengguna';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function findById() {
        
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pengguna = :id_pengguna';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pengguna', $this->id_pengguna);
            $stmt->execute();      
            return $stmt->fetch(PDO::FETCH_ASSOC);
           
    }
       
}
?>

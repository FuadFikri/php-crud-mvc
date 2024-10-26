<?php
class HakAkses {
    private $conn;
    private $table = 'hakakses';

    public $id_akses;
    public $nama_akses;
    public $keterangan;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getHakAksess() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (nama_akses, keterangan) VALUES (:nama_akses, :keterangan)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_akses', $this->nama_akses);
        $stmt->bindParam(':keterangan', $this->keterangan);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET nama_akses = :nama_akses, keterangan = :keterangan WHERE id_akses = :id_akses';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_akses', $this->nama_akses);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':id_akses', $this->id_akses);
        if($stmt->execute()) {
            return true;
        } else {
            // Output error information for debugging
            print_r($stmt->errorInfo());
            return false;
        }
    }

  
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_akses = :id_akses';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_akses', $this->id_akses);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function findById() {
        
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_akses = :id_akses';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_akses', $this->id_akses);
            $stmt->execute();      
            return $stmt->fetch(PDO::FETCH_ASSOC);
           
    }
       
}
?>

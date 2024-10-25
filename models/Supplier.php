<?php
class Supplier {
    private $conn;
    private $table = 'supplier';

    public $id_supplier;
    public $nama_supplier;
    public $alamat_supplier;
    public $email_supplier;
    public $no_telp_supplier;
    public $keterangan;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getsuppliers() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (nama_supplier, alamat_supplier, email_supplier, no_telp_supplier, keterangan) VALUES (:nama_supplier, :alamat_supplier, :email_supplier, :no_telp_supplier, :keterangan)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_supplier', $this->nama_supplier);
        $stmt->bindParam(':alamat_supplier', $this->alamat_supplier);
        $stmt->bindParam(':email_supplier', $this->email_supplier);
        $stmt->bindParam(':no_telp_supplier', $this->no_telp_supplier);
        $stmt->bindParam(':keterangan', $this->keterangan);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET nama_supplier = :nama_supplier, alamat_supplier = :alamat_supplier, email_supplier = :email_supplier, no_telp_supplier = :no_telp_supplier,  keterangan = :keterangan WHERE id_supplier = :id_supplier';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama_supplier', $this->nama_supplier);
        $stmt->bindParam(':alamat_supplier', $this->alamat_supplier);
        $stmt->bindParam(':email_supplier', $this->email_supplier);
        $stmt->bindParam(':no_telp_supplier', $this->no_telp_supplier);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':id_supplier', $this->id_supplier);
        if($stmt->execute()) {
            return true;
        } else {
            // Output error information for debugging
            print_r($stmt->errorInfo());
            return false;
        }
    }

  
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_supplier = :id_supplier';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_supplier', $this->id_supplier);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

  
    public function findById() {
        
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_supplier = :id_supplier';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_supplier', $this->id_supplier);
            $stmt->execute();      
            return $stmt->fetch(PDO::FETCH_ASSOC);
           
    }
       
}
?>

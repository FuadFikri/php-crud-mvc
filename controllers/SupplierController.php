<?php
require_once 'config/Database.php';
require_once 'models/Supplier.php';

class SupplierController {
    private $supplier;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->supplier = new Supplier($db);
    }

    // Display list of supplier
    public function index() {
        $supplier = $this->supplier->getSuppliers();
       
        include_once 'views/supplier/index.php';
    }



    public function edit($id) {
      
        $this->supplier->id_supplier = $id;
        $supplier = $this->supplier->findById();
      
        include_once 'views/supplier/edit.php';
    }

    public function create() {
        include_once 'views/supplier/create.php'; 
    }

 
    public function store($data) {
        $this->supplier->nama_supplier = $data['nama_supplier'];
        $this->supplier->alamat_supplier = $data['alamat_supplier'];
        $this->supplier->email_supplier = $data['email_supplier'];
        $this->supplier->no_telp_supplier = $data['no_telp_supplier'];
        $this->supplier->keterangan = $data['keterangan'];
        $this->supplier->create();
        header('Location: index.php?controller=supplier&action=index');
    }

    // Update supplier
    public function update($data) {
        print_r($data);
        $this->supplier->id_supplier = $data['id_supplier'];
        $this->supplier->nama_supplier = $data['nama_supplier'];
        $this->supplier->alamat_supplier = $data['alamat_supplier'];
        $this->supplier->email_supplier = $data['email_supplier'];
        $this->supplier->no_telp_supplier = $data['no_telp_supplier'];
        $this->supplier->keterangan = $data['keterangan'];
        $this->supplier->update();
        header('Location: index.php?controller=supplier&action=index');
        
    }

    // Delete supplier
    public function delete($id) {
        $this->supplier->id_supplier = $id;
        if($this->supplier->delete()) {
            header('Location: index.php?controller=supplier&action=index');
        }
    }
}
?>

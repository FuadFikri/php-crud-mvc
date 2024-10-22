<?php
require_once 'config/Database.php';
require_once 'models/Barang.php';

class BarangController {
    private $barang;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->barang = new Barang($db);
    }

    // Display list of barang
    public function index() {
        $barang = $this->barang->getBarangs();
       
        include_once 'views/barang/index.php';
    }



    public function edit($id) {
      
        $this->barang->id_barang = $id;
        $barang = $this->barang->findById();
      
        include_once 'views/barang/edit.php';
    }

    public function create() {
        include_once 'views/barang/create.php'; 
    }

 
    public function store($data) {
        $this->barang->nama_barang = $data['nama_barang'];
        $this->barang->keterangan = $data['keterangan'];
        $this->barang->satuan = $data['satuan'];
        $this->barang->create();
        header('Location: index.php?controller=barang&action=index');
    }

    // Update barang
    public function update($data) {
        print_r($data);
        $this->barang->id_barang = $data['id_barang'];
        $this->barang->nama_barang = $data['nama_barang'];
        $this->barang->keterangan = $data['keterangan'];
        $this->barang->satuan = $data['satuan'];

        $this->barang->update();
        header('Location: index.php?controller=barang&action=index');
        
    }

    // Delete barang
    public function delete($id) {
        $this->barang->id_barang = $id;
        if($this->barang->delete()) {
            header('Location: index.php?controller=barang&action=index');
        }
    }
}
?>

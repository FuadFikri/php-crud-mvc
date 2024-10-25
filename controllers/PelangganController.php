<?php
require_once 'config/Database.php';
require_once 'models/Pelanggan.php';

class PelangganController {
    private $pelanggan;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->pelanggan = new Pelanggan($db);
    }

    // Display list of pelanggan
    public function index() {
        $pelanggan = $this->pelanggan->getPelanggans();
       
        include_once 'views/pelanggan/index.php';
    }



    public function edit($id) {
      
        $this->pelanggan->id_pelanggan = $id;
        $pelanggan = $this->pelanggan->findById();
      
        include_once 'views/pelanggan/edit.php';
    }

    public function create() {
        include_once 'views/pelanggan/create.php'; 
    }

 
    public function store($data) {
        $this->pelanggan->nama_pelanggan = $data['nama_pelanggan'];
        $this->pelanggan->alamat_pelanggan = $data['alamat_pelanggan'];
        $this->pelanggan->email_pelanggan = $data['email_pelanggan'];
        $this->pelanggan->no_telp_pelanggan = $data['no_telp_pelanggan'];
        $this->pelanggan->keterangan = $data['keterangan'];
        $this->pelanggan->create();
        header('Location: index.php?controller=pelanggan&action=index');
    }

    // Update pelanggan
    public function update($data) {
        print_r($data);
        $this->pelanggan->id_pelanggan = $data['id_pelanggan'];
        $this->pelanggan->nama_pelanggan = $data['nama_pelanggan'];
        $this->pelanggan->alamat_pelanggan = $data['alamat_pelanggan'];
        $this->pelanggan->email_pelanggan = $data['email_pelanggan'];
        $this->pelanggan->no_telp_pelanggan = $data['no_telp_pelanggan'];
        $this->pelanggan->keterangan = $data['keterangan'];
        $this->pelanggan->update();
        header('Location: index.php?controller=pelanggan&action=index');
        
    }

    // Delete pelanggan
    public function delete($id) {
        $this->pelanggan->id_pelanggan = $id;
        if($this->pelanggan->delete()) {
            header('Location: index.php?controller=pelanggan&action=index');
        }
    }
}
?>

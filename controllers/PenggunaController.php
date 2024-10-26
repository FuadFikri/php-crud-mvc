<?php
require_once 'config/Database.php';
require_once 'models/Pengguna.php';

class PenggunaController {
    private $pengguna;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->pengguna = new pengguna($db);
    }

    // Display list of pengguna
    public function index() {
        $pengguna = $this->pengguna->getpenggunas();
       
        include_once 'views/pengguna/index.php';
    }



    public function edit($id) {
      
        $this->pengguna->id_pengguna = $id;
        $pengguna = $this->pengguna->findById();
      
        include_once 'views/pengguna/edit.php';
    }

    public function create() {
        include_once 'views/pengguna/create.php'; 
    }

 
    public function store($data) {
        $this->pengguna->nama_pengguna = $data['nama_pengguna'];
        $this->pengguna->password = $data['password'];
        $this->pengguna->nama_depan = $data['nama_depan'];
        $this->pengguna->nama_belakang = $data['nama_belakang'];
        $this->pengguna->no_hp = $data['no_hp'];
        $this->pengguna->alamat = $data['alamat'];
        $this->pengguna->id_akses = $data['id_akses'];
        $this->pengguna->create();
        header('Location: index.php?controller=pengguna&action=index');
    }

    // Update pengguna
    public function update($data) {
        print_r($data);
        $this->pengguna->id_pengguna = $data['id_pengguna'];
        $this->pengguna->nama_pengguna = $data['nama_pengguna'];
        $this->pengguna->password = $data['password'];
        $this->pengguna->nama_depan = $data['nama_depan'];
        $this->pengguna->nama_belakang = $data['nama_belakang'];
        $this->pengguna->no_hp = $data['no_hp'];
        $this->pengguna->alamat = $data['alamat'];
        $this->pengguna->id_akses = $data['id_akses'];
        $this->pengguna->update();
        header('Location: index.php?controller=pengguna&action=index');
        
    }

    // Delete pengguna
    public function delete($id) {
        $this->pengguna->id_pengguna = $id;
        if($this->pengguna->delete()) {
            header('Location: index.php?controller=pengguna&action=index');
        }
    }
}
?>

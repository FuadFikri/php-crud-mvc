<?php
require_once 'config/Database.php';
require_once 'models/HakAkses.php';

class HakAksesController {
    private $hakakses;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->hakakses = new HakAkses($db);
    }

    // Display list of pengguna
    public function index() {
        $hakakses = $this->hakakses->getHakAksess();
       
        include_once 'views/hakakses/index.php';
    }



    public function edit($id) {
      
        $this->hakakses->id_akses = $id;
        $hakakses = $this->hakakses->findById();
      
        include_once 'views/hakakses/edit.php';
    }

    public function create() {
        include_once 'views/hakakses/create.php'; 
    }

 
    public function store($data) {
        $this->hakakses->nama_akses = $data['nama_akses'];
        $this->hakakses->keterangan = $data['keterangan'];
        $this->hakakses->create();
        header('Location: index.php?controller=hakakses&action=index');
    }

    // Update
    public function update($data) {
        if (isset($data['id_akses'])) {
            $this->hakakses->id_akses = $data['id_akses'];
        }
        
        $this->hakakses->nama_akses = $data['nama_akses'];
        $this->hakakses->keterangan = $data['keterangan'];
    
        if ($this->hakakses->update()) {
            header('Location: index.php?controller=hakakses&action=index');
        } else {
        
        }
    }
    

    // Delete
    public function delete($id) {
        $this->hakakses->id_akses = $id;
        if($this->hakakses->delete()) {
            header('Location: index.php?controller=hakakses&action=index');
        }
    }
}
?>

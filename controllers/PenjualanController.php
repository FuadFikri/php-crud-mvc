<?php
require_once 'config/Database.php';
require_once 'models/Penjualan.php';
require_once 'models/Barang.php';
require_once 'models/Pengguna.php';
require_once 'models/Pelanggan.php';

class PenjualanController {
    private $penjualan;
    private $barang;
    private $pelanggan;
    private $pengguna;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->penjualan = new Penjualan($db);
        $this->barang = new Barang($db);
        $this->pelanggan = new Pelanggan($db);
        $this->pengguna = new Pengguna($db);
    }

    public function index() {
        $penjualan = $this->penjualan->getPenjualan();
        include_once 'views/penjualan/index.php';
    }

    public function create() {
        $barang = $this->barang->getBarangs();
        $pengguna = $this->pengguna->getPenggunas();
        $pelanggan = $this->pelanggan->getpelanggans();
        include_once 'views/penjualan/create.php';
    }

    public function store($data) {
        $this->penjualan->id_penjualan = $data['id_penjualan'];
        $this->penjualan->jumlah_penjualan = $data['jumlah_penjualan'];
        $this->penjualan->harga_jual = $data['harga_jual'];
        $this->penjualan->id_pengguna = $data['id_pengguna'];
        $this->penjualan->id_pelanggan = $data['id_pelanggan'];
        $this->penjualan->id_barang = $data['id_barang'];
        $this->penjualan->create();
        header('Location: index.php?controller=penjualan&action=index');
    }

    public function edit($id) {
        $this->penjualan->id_penjualan = $id;
        $penjualan = $this->penjualan->findById();
        $barang = $this->barang->getBarangs();
        $pengguna = $this->pengguna->getPenggunas();
        $pelanggan = $this->pelanggan->getpelanggans();
        include_once 'views/penjualan/edit.php';
    }

    public function update($data) {
        // print_r($data);
        $this->penjualan->id_penjualan = $data['id_penjualan'];
        $this->penjualan->jumlah_penjualan = $data['jumlah_penjualan'];
        $this->penjualan->harga_jual = $data['harga_jual'];
        $this->penjualan->id_pengguna = $data['id_pengguna'];
        $this->penjualan->id_barang = $data['id_barang'];
        $this->penjualan->id_pelanggan = $data['id_pelanggan'];

        $this->penjualan->update();
        header('Location: index.php?controller=penjualan&action=index');
        
    }

    public function delete($id) {
        $this->penjualan->id_penjualan = $id;
        if($this->penjualan->delete()) {
            header('Location: index.php?controller=penjualan&action=index');
        }
    }
}

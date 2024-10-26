<?php
require_once 'config/Database.php';
require_once 'models/Pembelian.php';
require_once 'models/Barang.php';
require_once 'models/Supplier.php';
require_once 'models/Pengguna.php';

class PembelianController {
    private $pembelian;
    private $barang;
    private $supplier;
    private $pengguna;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->pembelian = new Pembelian($db);
        $this->barang = new Barang($db);
        $this->supplier = new Supplier($db);
        $this->pengguna = new Pengguna($db);
    }

    public function index() {
        $pembelian = $this->pembelian->getPembelian();
        include_once 'views/pembelian/index.php';
    }

    public function create() {
        $barang = $this->barang->getBarangs();
        $pengguna = $this->pengguna->getPenggunas();
        $supplier = $this->supplier->getSuppliers();
        include_once 'views/pembelian/create.php';
    }

    public function store($data) {
        $this->pembelian->id_pengguna = $data['id_pengguna'];
        $this->pembelian->jumlah_pembelian = $data['jumlah_pembelian'];
        $this->pembelian->harga_beli = $data['harga_beli'];
        $this->pembelian->id_barang = $data['id_barang'];
        $this->pembelian->id_supplier = $data['id_supplier'];
        $this->pembelian->create();
        header('Location: index.php?controller=pembelian&action=index');
    }

    public function edit($id) {
        $this->pembelian->id_pembelian = $id;
        $pembelian = $this->pembelian->findById();
        $barang = $this->barang->getBarangs();
        $pengguna = $this->pengguna->getPenggunas();
        $supplier = $this->supplier->getSuppliers();
        include_once 'views/pembelian/edit.php';
    }

    public function update($data) {
        $this->pembelian->id_pembelian = $data['id_pembelian'];
        $this->pembelian->jumlah_pembelian = $data['jumlah_pembelian'];
        $this->pembelian->harga_beli = $data['harga_beli'];
        $this->pembelian->id_pengguna = $data['id_pengguna'];
        $this->pembelian->id_barang = $data['id_barang'];
        $this->pembelian->id_supplier = $data['id_supplier'];

        $this->pembelian->update();
        header('Location: index.php?controller=pembelian&action=index');
        
    }

    public function delete($id) {
        $this->pembelian->id_pembelian = $id;
        if($this->pembelian->delete()) {
            header('Location: index.php?controller=pembelian&action=index');
        }
    }

}

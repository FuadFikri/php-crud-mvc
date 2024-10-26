<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
    <h2>Buat Data Pembelian</h2>
    <form action="index.php?controller=pembelian&action=store" method="POST">
        <div class="mb-3">
            <label for="id_pengguna" class="form-label">Pengguna</label>
            <select name="id_pengguna" class="form-control">
                <option value="">Pilih Pengguna</option>
                <?php foreach($pengguna as $user): ?>
                    <option value="<?= $user['id_pengguna'] ?>"><?= $user['nama_pengguna'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_barang" class="form-label">Barang</label>
            <select name="id_barang" class="form-control">
                <option value="">Pilih Barang</option>
                <?php foreach($barang as $item): ?>
                    <option value="<?= $item['id_barang'] ?>"><?= $item['nama_barang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select name="id_supplier" class="form-control">
                <option value="">Pilih Supplier</option>
                <?php foreach($supplier as $sup): ?>
                    <option value="<?= $sup['id_supplier'] ?>"><?= $sup['nama_supplier'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian</label>
            <input type="number" name="jumlah_pembelian" class="form-control">
        </div>

        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</main>

<?php include 'views/layout/footer.php'; ?>

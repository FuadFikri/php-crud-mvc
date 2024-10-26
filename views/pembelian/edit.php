<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
    <h2>Edit Data Pembelian</h2>
    <form action="index.php?controller=pembelian&action=update" method="POST">
        <input type="hidden" class="form-control" id="id_pembelian" name="id_pembelian" required value ="<?= $pembelian['id_pembelian']?>" >
        <div class="mb-3">
            <label for="id_pembelian" class="form-label">Id Pembelian</label>
            <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" required value ="<?= $pembelian['id_pembelian']?>" disabled >
        </div>

        <div class="mb-3">
            <label for="id_pengguna" class="form-label">Pengguna</label>
            <select name="id_pengguna" class="form-control">
                <option value="">Pilih Pengguna</option>
                <?php foreach($pengguna as $item): ?>
                    <option value="<?= $item['id_pengguna'] ?>" <?= ($item['id_pengguna'] == $pembelian['id_pengguna']) ? 'selected' : '' ?>><?= $item['nama_depan'] ?> <?= $item['nama_belakang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_barang" class="form-label">Barang</label>
            <select name="id_barang" class="form-control">
                <option value="">Pilih Barang</option>
                <?php foreach($barang as $item): ?>
                    <option value="<?= $item['id_barang'] ?>" <?= ($item['id_barang'] == $pembelian['id_barang']) ? 'selected' : '' ?>><?= $item['nama_barang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select name="id_supplier" class="form-control">
                <option value="">Pilih Supplier</option>
                <?php foreach($supplier as $item): ?>
                    <option value="<?= $item['id_supplier'] ?>" <?= ($item['id_supplier'] == $pembelian['id_supplier']) ? 'selected' : '' ?>><?= $item['nama_supplier'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian</label>
            <input type="number" name="jumlah_pembelian" class="form-control" value="<?= $pembelian['jumlah_pembelian'] ?>">
        </div>

        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" value="<?= $pembelian['harga_beli'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</main>

<?php include 'views/layout/footer.php'; ?>

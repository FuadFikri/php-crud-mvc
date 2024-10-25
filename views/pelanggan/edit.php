<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Edit Barang</h2>
<form action="index.php?controller=pelanggan&action=update" method="POST" class="needs-validation" novalidate>
    
    <!-- ID pelanggan hidden input for form submission -->
    <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" />

    <div class="mb-3">
        <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
        <!-- Displaying disabled id_pelanggan -->
        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required value="<?= htmlspecialchars($pelanggan['nama_pelanggan'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="invalid-feedback">
            Masukkan Nama pelanggan.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
        <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required value="<?= htmlspecialchars($pelanggan['alamat_pelanggan'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="invalid-feedback">
            Masukkan Alamat pelanggan.
        </div>
    </div>

    <div class="mb-3">
        <label for="email_pelanggan" class="form-label">Email Pelanggan</label>
        <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan" required value="<?= htmlspecialchars($pelanggan['email_pelanggan'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="invalid-feedback">
            Masukkan Email pelanggan.
        </div>
    </div>

    <div class="mb-3">
        <label for="no_telp_pelanggan" class="form-label">No Telp Pelanggan</label>
        <input type="text" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan" required value="<?= htmlspecialchars($pelanggan['no_telp_pelanggan'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="invalid-feedback">
            Masukkan No Telp pelanggan.
        </div>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= htmlspecialchars($pelanggan['keterangan'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="invalid-feedback">
            Masukkan Keterangan pelanggan.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

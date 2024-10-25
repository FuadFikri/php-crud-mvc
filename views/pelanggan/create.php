<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Create Pelanggan</h2>
<form action="index.php?controller=pelanggan&action=store" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
        <div class="invalid-feedback">
            Masukkan Nama Pelanggan.
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
        <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required>
        <div class="invalid-feedback">
            Masukkan Nama pelanggan.
        </div>
    </div>
    <div class="mb-3">
        <label for="email_pelanggan" class="form-label">Email Pelanggan</label>
        <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" required>
        <div class="invalid-feedback">
            Masukkan Nama pelanggan.
        </div>
    </div>
    <div class="mb-3">
        <label for="no_telp_pelanggan" class="form-label">No Telp Pelanggan</label>
        <input type="text" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan" required>
        <div class="invalid-feedback">
            Masukkan Nama pelanggan.
        </div>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
        <div class="invalid-feedback">
            Please provide a description.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

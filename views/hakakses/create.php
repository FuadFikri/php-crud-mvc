<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Create Hak Akses</h2>
<form action="index.php?controller=hakakses&action=store" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nama_akses" class="form-label">Nama Akses</label>
        <input type="text" class="form-control" id="nama_akses" name="nama_akses" required>
        <div class="invalid-feedback">
            Masukkan Nama Akses.
        </div>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
        <div class="invalid-feedback">
            Masukkan Nama hakakses.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

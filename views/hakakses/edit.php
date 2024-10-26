<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Edit Akses</h2>
<form action="index.php?controller=hakakses&action=update" method="POST" class="needs-validation" novalidate>
    
    <!-- ID hakakses hidden input for form submission -->
    <input type="hidden" class="form-control" id="id_akses" name="id_akses" value="<?= $hakakses['id_akses'] ?>" />

    <div class="mb-3">
        <label for="id_akses" class="form-label">Id Hak Akses</label>
        <!-- Displaying disabled hak akses -->
        <input type="text" class="form-control" id="id_akses" name="id_akses" value="<?= $hakakses['id_akses'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="nama_akses" class="form-label">Nama Akses</label>
        <input type="text" class="form-control" id="nama_akses" name="nama_akses" required value="<?=$hakakses['nama_akses']?>">
        <div class="invalid-feedback">
            Masukkan Nama Akses.
        </div>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $hakakses['keterangan'] ?>">
        <div class="invalid-feedback">
            Masukkan Keterangan.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

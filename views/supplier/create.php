<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Create Supplier</h2>
<form action="index.php?controller=supplier&action=store" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nama_supplier" class="form-label">Nama Supplier</label>
        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
        <div class="invalid-feedback">
            Masukkan Nama Supplier.
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required>
        <div class="invalid-feedback">
            Masukkan Nama Supplier.
        </div>
    </div>
    <div class="mb-3">
        <label for="email_supplier" class="form-label">Email Supplier</label>
        <input type="text" class="form-control" id="email_supplier" name="email_supplier" required>
        <div class="invalid-feedback">
            Masukkan Nama Supplier.
        </div>
    </div>
    <div class="mb-3">
        <label for="no_telp_supplier" class="form-label">No Telp Supplier</label>
        <input type="text" class="form-control" id="no_telp_supplier" name="no_telp_supplier" required>
        <div class="invalid-feedback">
            Masukkan Nama Supplier.
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

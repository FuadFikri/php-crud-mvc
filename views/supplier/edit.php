<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Edit Barang</h2>
<form action="index.php?controller=supplier&action=update" method="POST" class="needs-validation" novalidate>
    
    <!-- ID Supplier hidden input for form submission -->
    <input type="hidden" class="form-control" id="id_supplier" name="id_supplier" value="<?= $supplier['id_supplier'] ?>" />

    <div class="mb-3">
        <label for="id_supplier" class="form-label">Id Supplier</label>
        <!-- Displaying disabled id_supplier -->
        <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= $supplier['id_supplier'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="nama_supplier" class="form-label">Nama Supplier</label>
        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required value="<?=$supplier['nama_supplier']?>">
        <div class="invalid-feedback">
            Masukkan Nama Supplier.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required value="<?=$supplier['alamat_supplier']?>">
        <div class="invalid-feedback">
            Masukkan Alamat Supplier.
        </div>
    </div>

    <div class="mb-3">
        <label for="email_supplier" class="form-label">Email Supplier</label>
        <input type="email" class="form-control" id="email_supplier" name="email_supplier" required value="<?= $supplier['email_supplier'] ?>">
        <div class="invalid-feedback">
            Masukkan Email Supplier.
        </div>
    </div>

    <div class="mb-3">
        <label for="no_telp_supplier" class="form-label">No Telp Supplier</label>
        <input type="text" class="form-control" id="no_telp_supplier" name="no_telp_supplier" required value="<?= $supplier['no_telp_supplier'] ?>">
        <div class="invalid-feedback">
            Masukkan No Telp Supplier.
        </div>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $supplier['keterangan']?>">
        <div class="invalid-feedback">
            Masukkan Keterangan Supplier.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

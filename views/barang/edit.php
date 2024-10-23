<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Edit Barang</h2>
<form action="index.php?controller=barang&action=update" method="POST" class="needs-validation" novalidate>
    
    <input type="hidden" class="form-control" id="id_barang" name="id_barang" required value ="<?= $barang['id_barang']?>" >
    <div class="mb-3">
        <label for="id_barang" class="form-label">Id Barang</label>
        <input type="text" class="form-control" id="id_barang" name="id_barang" required value ="<?= $barang['id_barang']?>" disabled >
        
    </div>


    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?= $barang['nama_barang'] ?>">
        <div class="invalid-feedback">
            Please enter a name for the barang.
        </div>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $barang['keterangan'] ?>">
        <div class="invalid-feedback">
            Please provide a description.
        </div>
    </div>
    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <input type="text" class="form-control" id="satuan" name="satuan" required value="<?= $barang['satuan'] ?>">
        <div class="invalid-feedback">
            Please enter the unit.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Create Pengguna</h2>
<form action="index.php?controller=pengguna&action=store" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nama_pengguna" class="form-label">Nama pengguna</label>
        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="nama_depan" class="form-label">Nama Depan</label>
        <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="nama_belakang" class="form-label">Nama Belakang</label>
        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No Hape</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Pengguna</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required>
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>
    <div class="mb-3">
        <label for="id_akses" class="form-label">Id Akses</label>
        <input type="text" class="form-control" id="id_akses" name="id_akses" required>
        <div class="invalid-feedback">
            Please provide a description.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Edit Pengguna</h2>
<form action="index.php?controller=pengguna&action=update" method="POST" class="needs-validation" novalidate>
    
    <!-- ID pengguna hidden input for form submission -->
    <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>" />

    <div class="mb-3">
        <label for="id_pengguna" class="form-label">Id Pengguna</label>
        <!-- Displaying disabled id_pengguna -->
        <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required value="<?=$pengguna['nama_pengguna']?>">
        <div class="invalid-feedback">
            Masukkan Nama pengguna.
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password" required value="<?= $pengguna['password'] ?>">
        <div class="invalid-feedback">
            Masukkan password pengguna.
        </div>
    </div>

    <div class="mb-3">
        <label for="nama_depan" class="form-label">Nama Depan</label>
        <input type="text" class="form-control" id="nama_depan" name="nama_depan" required value="<?= $pengguna['nama_depan']?>">
        <div class="invalid-feedback">
            Masukkan nama depan pengguna.
        </div>
    </div>

    <div class="mb-3">
        <label for="nama_belakang" class="form-label">Nama Belakang</label>
        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required value="<?= $pengguna['nama_belakang']?>">
        <div class="invalid-feedback">
            Masukkan nama belakang pengguna.
        </div>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor Hape</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" required value="<?= $pengguna['no_hp']?>">
        <div class="invalid-feedback">
            Masukkan no hp pengguna.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Pengguna</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required value="<?=$pengguna['alamat']?>">
        <div class="invalid-feedback">
            Masukkan Alamat pengguna.
        </div>
    </div>

    <div class="mb-3">
        <label for="id_akses" class="form-label">Id Akses</label>
        <input type="text" class="form-control" id="id_akses" name="id_akses" required value="<?= $pengguna['id_akses']?>">
        <div class="invalid-feedback">
            Masukkan id akses pengguna.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</main>

<?php include 'views/layout/footer.php'; ?>

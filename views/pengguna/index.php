<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>List Pengguna</h2>
<a href="index.php?controller=pengguna&action=create" class="btn btn-primary">Buat Data pengguna</a>

<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama pengguna</th>
            <th>Password</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Nomor Hape</th>
            <th>Alamat</th>
            <th>Id Akses</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $pengguna->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_pengguna'] ?></td>
            <td><?= $row['nama_pengguna'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['nama_depan'] ?></td>
            <td><?= $row['nama_belakang'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['id_akses'] ?></td>
            <td>
                <a href="index.php?controller=pengguna&action=edit&id=<?= $row['id_pengguna'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                <a href="index.php?controller=pengguna&action=delete&id=<?= $row['id_pengguna'] ?>"  class="btn btn-sm btn-danger">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


</main>

<?php include 'views/layout/footer.php'; ?>
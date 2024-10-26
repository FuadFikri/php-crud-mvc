<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>List Hak Akses</h2>
<a href="index.php?controller=hakakses&action=create" class="btn btn-primary">Buat Data Hak Akses</a>

<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama Akses</th>
            <th>Keterangan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $hakakses->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_akses'] ?></td>
            <td><?= $row['nama_akses'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a href="index.php?controller=hakakses&action=edit&id=<?= $row['id_akses'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                <a href="index.php?controller=hakakses&action=delete&id=<?= $row['id_akses'] ?>"  class="btn btn-sm btn-danger">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


</main>

<?php include 'views/layout/footer.php'; ?>
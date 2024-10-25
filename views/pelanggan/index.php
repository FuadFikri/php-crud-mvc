<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Pelanggan List</h2>
<a href="index.php?controller=pelanggan&action=create" class="btn btn-primary">Buat Data pelanggan</a>

<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat Pelanggan</th>
            <th>Email Pelanggan</th>
            <th>No Telp Pelanggan</th>
            <th>Keterangan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $pelanggan->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_pelanggan'] ?></td>
            <td><?= $row['nama_pelanggan'] ?></td>
            <td><?= $row['alamat_pelanggan'] ?></td>
            <td><?= $row['email_pelanggan'] ?></td>
            <td><?= $row['no_telp_pelanggan'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a href="index.php?controller=pelanggan&action=edit&id=<?= $row['id_pelanggan'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                <a href="index.php?controller=pelanggan&action=delete&id=<?= $row['id_pelanggan'] ?>"  class="btn btn-sm btn-danger">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


</main>

<?php include 'views/layout/footer.php'; ?>
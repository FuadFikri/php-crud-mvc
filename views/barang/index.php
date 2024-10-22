<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Barang List</h2>
<a href="index.php?controller=barang&action=create" class="btn btn-primary">Buat Data Barang</a>

<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Satuan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $barang->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td><?= $row['satuan'] ?></td>
            <td>
                <a href="index.php?controller=barang&action=edit&id=<?= $row['id_barang'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                <a href="index.php?controller=barang&action=delete&id=<?= $row['id_barang'] ?>"  class="btn btn-sm btn-danger">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


</main>

<?php include 'views/layout/footer.php'; ?>
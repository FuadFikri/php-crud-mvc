<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Supplier List</h2>
<a href="index.php?controller=supplier&action=create" class="btn btn-primary">Buat Data Supplier</a>

<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Email Supplier</th>
            <th>No Telp Supplier</th>
            <th>Keterangan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $supplier->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_supplier'] ?></td>
            <td><?= $row['nama_supplier'] ?></td>
            <td><?= $row['alamat_supplier'] ?></td>
            <td><?= $row['email_supplier'] ?></td>
            <td><?= $row['no_telp_supplier'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a href="index.php?controller=supplier&action=edit&id=<?= $row['id_supplier'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                <a href="index.php?controller=supplier&action=delete&id=<?= $row['id_supplier'] ?>"  class="btn btn-sm btn-danger">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


</main>

<?php include 'views/layout/footer.php'; ?>
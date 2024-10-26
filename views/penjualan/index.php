<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
    <h2>Penjualan List</h2>
    <a href="index.php?controller=penjualan&action=create" class="btn btn-primary">Buat Data Penjualan</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID Penjualan</th>
                <th>Nama Pengguna</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Jumlah Penjualan</th>
                <th>Harga Jual</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $penjualan->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id_penjualan'] ?></td>
                <td><?= $row['nama_depan'] ?> <?= $row['nama_belakang'] ?></td>
                <td><?= $row['nama_pelanggan'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah_penjualan'] ?></td>
                <td><?= $row['harga_jual'] ?></td>
                <td>
                    <a href="index.php?controller=penjualan&action=edit&id=<?= $row['id_penjualan'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                    <a href="index.php?controller=penjualan&action=delete&id=<?= $row['id_penjualan'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php include 'views/layout/footer.php'; ?>
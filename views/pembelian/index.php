<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
    <h2>Pembelian List</h2>
    <a href="index.php?controller=pembelian&action=create" class="btn btn-primary">Buat Data Pembelian</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID Pembelian</th>
                <th>Nama Pengguna</th>
                <th>Nama Barang</th>
                <th>Nama Supplier</th>
                <th>Jumlah Pembelian</th>
                <th>Harga Beli</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $pembelian->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id_pembelian'] ?></td>
                <td><?= $row['nama_depan'] ?> <?= $row['nama_belakang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['nama_supplier'] ?></td>
                <td><?= $row['jumlah_pembelian'] ?></td>
                <td><?= $row['harga_beli'] ?></td>
                <td>
                    <a href="index.php?controller=pembelian&action=edit&id=<?= $row['id_pembelian'] ?>"  class="btn btn-sm btn-warning">Edit </a>
                    <a href="index.php?controller=pembelian&action=delete&id=<?= $row['id_pembelian'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php include 'views/layout/footer.php'; ?>
<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>




<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<h2>Detail Barang</h2>
<p>id: <?= $barang['id_barang'] ?></p>
<p>nama: <?= $barang['nama_barang'] ?></p>
<p>keterangan: <?= $barang['keterangan'] ?></p>
<p>Satuan: <?= $barang['satuan'] ?></p>


</main>



<?php include 'views/layout/footer.php'; ?>
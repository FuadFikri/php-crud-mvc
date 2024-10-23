<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">

<button type="button" class="btn btn-primary">
  Total Penjualan <span class="badge badge-light">  <?= $total_penjualan['total_harga_jual']?> </span>
</button>



<button type="button" class="btn btn-success">
  Total Keuntungan <span class="badge badge-light"> <?= $keuntungan['total_keuntungan']?> </span>
</button>

<br>
<br>
<div class="row">
    <div class="col-sm">
    
    </div>
    <div class="col-sm">
    <h3 >Jumlah Persediaan</h3>
    </div>
    <div class="col-sm">
      
    </div>
  </div>


  <table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah Pembelian</th>
            <th>Total Pembelian</th>
            <th>Jumlah Penjualan</th>
            <th>Total Penjualan</th>
            <th>Selisih</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $laba_rugi->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['jumlah_pembelian'] ?></td>
            <td><?= $row['total_pembelian'] ?></td>
            <td><?= $row['jumlah_penjualan'] ?></td>
            <td><?= $row['total_penjualan'] ?></td>
            <td><?= $row['selisih'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</main>

<?php include 'views/layout/footer.php'; ?>

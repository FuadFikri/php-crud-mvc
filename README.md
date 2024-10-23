

1. clone project
2. copy folder ke xampp/htdocs
3. jalankan apache dan mysql di xampp
4. buat database dengan nama "tugas4" sesuai dengan konfigurasi di file Database.php di dalam folder config
5. jalankan sql di dalam file php-crud-mvc\database\create_table.sql
6. buka http://localhost/php-crud-mvc/ di browser



Membuat CRUD
1. Membuat class di dalam folder Models
2. Pastikan property di dalam class tersebut sama dengan kolom di database
3. Membuat Controller didalam folder controller
4. Membuat View
   1. Buat folder di dalam folder view
   2. Buat 3 file yaitu
      - create.php : untuk halaman create data
      - edit.php   : untuk halaman edit data
      - index.php  : untuk halaman  utama / list data
   3. pastikan setiap halaman view tersebut memiliki
    ```
      <?php include 'views/layout/header.php'; ?> 
      <?php include 'views/layout/sidebar.php'; ?>
        <------ di sini code html CRUD ------>
      <?php include 'views/layout/footer.php'; ?>
    ```

   4. pastikan isi dari form action sesuai dengan data yang dibuat
    ```
       <form action="index.php?controller=barang&action=store" method="POST">
    ```
      Berarti ketika form tersebut di-submit, maka akan mengarah ke BarangController dan ke function store

 5. Membuat menu Sidebar
    1. Buka views\layout\sidebar.php
    2. Tambahkan tag  <li> sesuai data yang dibutuhkan. 
    Contoh
    ```
        <li class="nav-item">
            <a class="nav-link " href="index.php?controller=barang&action=index">Barang</a>
        </li>
    ```

<?php

    include 'koneksi.php'; //mengimpor file koneksi database

    //mengecek apakah variabel 'nama' dan 'alamat' dari POST dan 'nama' dari GET sudah di-set
    if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_GET['nama'])) {
        $nama_baru = $_POST['nama']; //mengambil nilai nama baru dari form POST
        $alamat_baru = $_POST['alamat']; //mengambil nilai alamat baru dari form POST
        $nama_lama = $_GET['nama']; //mengambil nilai nama lama dari URL
    
        $sql = "UPDATE orang SET nama='$nama_baru', alamat='$alamat_baru' WHERE nama='$nama_lama'"; //membuat query SQL untuk mengupdate data
    
    }
        $result = mysqli_query($connect,$sql); //menjalankan query SQL

<?php

    include 'koneksi.php'; //mengimpor file koneksi database

    //mengecek apakah variabel 'nama' dari POST sudah di-set
    if(isset($_POST['nama'])){
        $nama = $_POST['nama']; //mengambil nilai nama dari form POST
        $alamat = $_POST['alamat']; //mengambil nilai alamat dari form POST
        $sql = "INSERT INTO orang VALUES ('$nama', '$alamat')"; //membuat query SQL untuk memasukkan data baru

        if(mysqli_query($connect,$sql)){
            echo "Berhasil Memasukkan Data"; //pesan jika berhasil memasukkan data
        }else{
            echo "Error Memasukkan Data <br/>".mysqli_error($connect); //pesan jika gagal memasukkan data
        }
    }
<?php

    include 'koneksi.php'; //megimpor file koneksi database

    $sql = "DELETE FROM orang WHERE nama='".$_GET['nama']."'"; //membuat query SQL untuk menghapus data berdasarkan nama
    $result = mysqli_query($connect,$sql); //menjalankan query SQL
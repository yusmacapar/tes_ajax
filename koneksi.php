<?php

    $servername = "localhost:3307"; //nama server database
    $username = "root"; //nama pengguna database
    $password = ""; //kata sandi database
    $database = "ajax"; //nama database

    $connect = mysqli_connect($servername,$username,$password,$database); //membuat koneksi ke database

    if(!$connect){
        die("Connection failed :".mysqli_connect_error()); //menampilkan pesan jika koneksi gagal
    }
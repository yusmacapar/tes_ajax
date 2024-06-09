<?php

    include 'koneksi.php'; //mengimpor file koneksi database
    
    $sql = "SELECT * FROM orang"; //membuat query SQL untuk mengambil semua data dari tabel 'orang'
    $result = mysqli_query($connect,$sql); //menjalankan query SQL dan menyimpan hasilnya dalam variabel $result
    
    if(mysqli_num_rows($result) > 0){ //mengecek apakah ada data yang diambil dari tabel 'orang'
        while($row = mysqli_fetch_assoc($result)){ //perulangan untuk setiap baris data hasil query
            $link_delete = "<a class='hapusData' href='delete.php?nama=" . $row['nama'] . "'>Delete</a>";
            $link_edit = "<a class='editData' href='edit.php?nama=" . $row['nama'] . "' nama='" . 
                            $row['nama'] . "' alamat='" . $row['alamat'] . "'>Edit</a>";
            echo "<tr>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['alamat'] . "</td>
                    <td>$link_edit | $link_delete</td>
                  </tr>"; //menampilkan data dengan link edit dan delete
        }
    } else {
        echo "<tr>
                <td colspan='3'>No data found</td>
              </tr>"; //pesan jika tidak ada data
    }
    
?>
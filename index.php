<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AJAX</title>

    <!-- memuat pustaka jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <style>
        form {
            margin-bottom: 10px;
        }
        input[type="text"] {
            margin-right: 10px;
            padding: 5px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 5px 10px;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        th {
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <!-- form yang akan mengirimkan data ke 'simpan.php' dengan metode POST -->
    <form action="simpan.php" method="POST">
        <input type="text" name="nama" placeholder="Nama Anda..." />
        <input type="text" name="alamat" placeholder="Alamat Anda..." />
        <input type="submit" name="submit" value="submit">
    </form>
    <hr/>
    
    <!-- container untuk konten tabel -->
    <div id="content"> 
        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- tempat data akan dimuat menggunakan AJAX -->
            <tbody id="table-content">

            </tbody>
        </table>
    </div>

    <script>
        /* memastikan kode didalamnya dijalankan setelah dokumen HTML dimuat */
        $(document).ready(function(){
            loadData();

            $('form').on('submit',function(e){ /*mecegah pengiriman form secara default*/
                e.preventDefault(); //mencegah default pengiriman form
                /*mengirim data form menggunakan AJAX*/
                $.ajax({ //adalah fungsi jQuery untuk melakukan permintaan AJAX.
                    type: $(this).attr('method'), //menetapkan tipe permintaan AJAX (GET atau POST) berdasarkan atribut method dari form.
                    url: $(this).attr('action'), //menetapkan URL tujuan dari permintaan AJAX berdasarkan atribut action dari form.
                    data: $(this).serialize(), //mengubah data form menjadi format string query yang siap dikirim.
                    success:function(){ /*memuat ulang data dan mereset form jika berhasil*/
                        loadData();
                        resetForm();
                    }
                });
            });

            function loadData(){ //digunakan untuk mengambil dan memperbarui data dari server.
                $.get('data.php',function(data){ /*untuk mengambil data dari data.php*/
                    $('#table-content').html(data); /*menempatkan data yang diterima di elemen dengan ID 'table-content'*/
                    $('.hapusData').click(function(e){ //menetapkan event handler untuk elemen dengan class hapusData yang akan dijalankan ketika elemen tersebut diklik.
                        e.preventDefault();
                        $.ajax({ //melakukan permintaan AJAX untuk menghapus data
                            type: 'get', //menetapkan tipe permintaan AJAX sebagai GET.
                            url: $(this).attr('href'), //menetapkan URL tujuan berdasarkan atribut href dari elemen yang diklik.
                            //menetapkan fungsi yang akan dijalankan ketika permintaan AJAX berhasil
                            success:function(){
                                loadData();
                            }
                        });
                    });
                    $('.editData').click(function(e){ //menetapkan event handler untuk elemen dengan class editData yang akan dijalankan ketika elemen tersebut diklik.
                        e.preventDefault();
                        $('[name=nama]').val($(this).attr('nama'));
                        $('[name=alamat]').val($(this).attr('alamat'));
                        $('form').attr('action',$(this).attr('href'));
                    });
                });
            }

            function resetForm(){
                $('[type=text]').val(''); /*mengosongkan input teks*/
                $('[name=nama]').focus(); /*mengatur fokus ke input nama*/
                $('form').attr('action','simpan.php'); /*mengatur ulang action form ke 'simpan.php'*/
            }
        });
    </script>
</body>
</html>

<?php
    require '../Controller/Connector.php';
		if (isset($_POST['btnBook'])) {

            //untuk update ruangan sehingga status book berubah
            $namaRuang = $_POST['ruangan'];
            $queryUpdateRuangan = "UPDATE ruang SET status_booking = '1' WHERE namaRuang = '$namaRuang'";
            

            //untuk pelanggan
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['nohp'];
            $alamat = $_POST['address'];

            //untuk transaksi
            $waktuMulai = $_POST['waktu_mulai'];
            $waktuAkhir = $_POST['waktu_akhir'];

            $nama = $db->escapeString($nama);
            $email = $db->escapeString($email);
            $no_hp = $db->escapeString($no_hp);
            $alamat = $db->escapeString($alamat);

            //untuk update alat
            $choices = $_POST['check_list'];
            for ($i=0; $i<sizeof ($choices);$i++) {  
                $query3="UPDATE alat SET status_booking = '1' WHERE namaAlat = '".$choices[$i]. "'"; 
            }

            //tanggal
            date_default_timezone_set("Asia/Bangkok");
            $my_date = date("Y-m-d H:i:s");

            //query get harga ruangan
            $qGetHargaRuangan = "SELECT tarif FROM ruang WHERE namaRuang = '$namaRuang'";
            $result = $db->executeNonSelectedQuery($qGetHargaRuangan);
            $res="";
            while ($row=mysqli_fetch_row($result))
            {
                $res =$row[0];
            }

            //menghitung total transaksi
            $totalTransaksi = $res * ($waktuAkhir - $waktuMulai);

            //query insert
            $query = "INSERT INTO pelanggan (nama, alamat, email, no_hp) VALUES ('$nama' , '$alamat' , '$email','$no_hp')";
            $query2 = "INSERT INTO transaksi (tanggal_transaksi , waktu_awal , waktu_akhir , total_transaksi) VALUES ('$my_date' , '$waktuMulai' , '$waktuAkhir' , '$totalTransaksi')";
<<<<<<< HEAD
            $db->executeNonSelectedQuery($query);
            $db->executeNonSelectedQuery($query2);
            //untuk get id fk dan memasukkan ke tabel fk(tabel relasi)
            $count = "SELECT COUNT(idTransaksi) FROM transaksi";
            $temp = $db->executeNonSelectedQuery($count);
             $resultqget = "";
             while ($row=mysqli_fetch_row($temp))
             {
             $resultqget = $row[0];
             }  
             $resultqget = $resultqget+1;


            $queryGet2 = "SELECT idPelanggan FROM pelanggan WHERE nama = '$nama'";
            $temp2 = $db->executeNonSelectedQuery($queryGet2);
            $resultqget2 = "";
            while ($row=mysqli_fetch_row($temp2))
=======


            //berhasil//



            //untuk get id fk dan memasukkan ke tabel fk(tabel relasi)
            $queryGet = "SELECT idTransaksi FROM transaksi WHERE tanggal_transaksi = '$my_date'";
            $resultIdTransaksi = $db->executeNonSelectedQuery($queryGet);
            $res1="";
            while ($row=mysqli_fetch_row($resultIdTransaksi))
>>>>>>> c2192b12a2e46c22ac5fa70dc5f4d61fcd5fcd76
            {
                $res1 = $row[0];
            }

<<<<<<< HEAD
            // echo $resultqget2;
            // echo $resultqget2;
            // echo $resultqget;
            
            $q = "INSERT INTO melakukan  VALUES ($resultqget2 , $resultqget)";
=======
            $queryGet2 = "SELECT idPelanggan FROM pelanggan WHERE nama = '$nama'";
            $resultIdPelanggan = $db->executeNonSelectedQuery($queryGet2);
            $res2="";
            while ($row=mysqli_fetch_row($resultIdPelanggan))
            {
                $res2 = $row[0];
            }
>>>>>>> c2192b12a2e46c22ac5fa70dc5f4d61fcd5fcd76
            
            // $db->executeSelectQuery($queryGet2);
            // $db->executeSelectQuery($queryGet);
            $q = "INSERT INTO melakukan(idPelanggan , idTransaksi) VALUES($res1 , $res2)";
            
<<<<<<< HEAD

            //query insert

   
=======
            //$rows = mysql_fetch_assoc($queryGet2);
            // //query insert
            // $db->executeSelectQuery($queryGet2);
            $db->executeNonSelectedQuery($query);
            $db->executeNonSelectedQuery($query2);
>>>>>>> c2192b12a2e46c22ac5fa70dc5f4d61fcd5fcd76
            $db->executeNonSelectedQuery($query3);

            $db->executeNonSelectedQuery($queryUpdateRuangan);
            // $db->executeNonSelectedQuery($q);
            // header('Location: ../View/OPERATOR-COMPLETE.php');
        }
?>
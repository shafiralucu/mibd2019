<?php
    require '../Controller/Connector.php';

             $getNamaRuang = "SELECT tanggal_transaksi, ruang.idRuang, imagesRuang, namaRuang, kapasitas, fasilitas, durasi, SUM(durasi*tarif) as total FROM ruang INNER JOIN sewa_ruang ON ruang.idRuang = sewa_ruang.idRuang INNER JOIN transaksi ON sewa_ruang.idTransaksi = transaksi.idTransaksi GROUP BY namaRuang";
             $query = $db->executeSelectQuery($getNamaRuang);

		if (isset($_POST['btnUpdate'])) {
            $tanggal1 = $_POST['tanggal1'];
            $tanggal2 = $_POST['tanggal2'];
            $getNamaRuang = "SELECT tanggal_transaksi, idRuang, imagesRuang, namaRuang, kapasitas, fasilitas, durasi, SUM(durasi*tarif) as total FROM ruang INNER JOIN sewa_ruang ON ruang.idRuang = sewa_ruang.idRuang INNER JOIN transaksi ON sewa_ruang.idTransaksi = transaksi.idTransaksi GROUP BY namaRuang WHERE tanggal_transaksi >= '$tanggal1' AND tanggal_transaksi <= '$tanggal2'";
            
          }   
          $result = $db->executeSelectQuery($getNamaRuang);
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>CUSTOMER - MANAJER</title>

<head>
  <style>
    * {
      box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    h5 {
      text-align: center;

    }

    #alamat {
      float: right;
    }

    .imgTable {
      width: 50%;
      height: auto;
      text-align: center;
    }

    table {
      border: none;
    }

    @font-face {
      font-family: header;
      src: url(fonts/Ailerons-Typeface.otf);
    }

    @font-face {
      font-family: texts;
      src: url("fonts/Renner_ 400 Book.ttf");
    }

    @font-face {
      font-family: navBarFont;
      src: url("fonts/Kiona-Regular.ttf");
      font-style: bold;

    }

    h1 {
      font-family: header;
      font-size: 70px;
      color: #373737;
    }

    a {
      font-family: navBarFont;
      font-size: 25px;
      color: #868B8E;
      font-style: bold;
    }


    h2 {
      font-family: texts2;
      font-size: 30px;
      color: #373737;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    h5 {
      font-family: texts;
      font-size: 20px;
      color: white;
    }

    #containerRuang {
      font-family: texts2;
      font-size: 20px;
      color: #373737;
    }

    .text {
      font-family: texts2;
      font-size: 25px;
      color: white;
    }

    .tablecust {
      font-family: texts2;
      font-size: 15px;
      color: #373737;
    }

    input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    input[type=text] {
      border: 1px solid #ccc;
    }

    .search-container {
      float: right;
    }

    .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }
    img {
      width: 6 00px; 
      height: 300px;
    }

  </style>
</head>

<body>
  <!-- header -->
  <div class="w3-container w3-white">
    <h1>Ruangku</h1>
  </div>

  <!-- navigation bar -->
  <div class="w3-bar w3-white w3-border" id="menu">
  <a href="MANAJER-RUANGAN.php" class="w3-bar-item w3-button">LIST RUANGAN</a>
    <a href="MANAJER-BARANG.php" class="w3-bar-item w3-button">LIST BARANG</a>
    <a href="MANAJER-TRANSAKSIHARIAN.php" class="w3-bar-item w3-button">TRANSAKSI HARIAN</a>
    <a href="MANAJER-CUSTOMER.php" class="w3-bar-item w3-button w3-dark-grey">STATISTIK RUANGAN</a>
    <a href="MANAJER-ALAT.php" class="w3-bar-item w3-button">STATISTIK BARANG</a>
    <a href="OPERATOR-HOME.php" class="w3-bar-item w3-button" style="float: right;">LOGOUT</a>
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>

  <br>
  <form action="MANAJER-CUSTOMER.php" style="float:left; margin-left: 5%;">
  Tanggal :
  <input type="date" name="transaksi">

<p style="float: left; margin-top: -0.01%; margin-left: 2%;">Sampai</p>

  Tanggal :
  <input type="date" name="transaksi">

<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnUpdate">Update Statistik</button>
    </div>
    <div class = "w3-container w3-center">
      <img src = "images/graph.jpg">
    </div>

  <div class="w3-container" style="margin: 3%;">
    <table class="w3-table-all w3-center" id="tabelcust" style="font-family: texts; font-size: 20px;">
      <thead>
        <tr class="w3-dark-grey">
            <th>Tanggal Transaksi</th>
            <th>Id</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kapasitas</th>
            <th>Fasilitas</th>
            <th>Durasi</th>
            <th>Total transaksi</th>
        </tr>
        <?php 
              foreach ($result as $key => $row) {
                echo "<tr>";
                echo "<td>".$row['tanggal_transaksi']."</td>";
                echo "<td>".$row['idRuang']."</td>";
                echo "<td><img src='images/".$row['imagesRuang']."'></td>";
                echo "<td>".$row['namaRuang']."</td>";
                echo "<td>".$row['kapasitas']."</td>";
                echo "<td>".$row['fasilitas']."</td>";
                echo "<td>".$row['durasi']."</td>";
                echo "<td>".$row['total']."</td>";
                echo "</tr>";
              }
            ?>
      </thead>
      </form>
    </table>
  </div>



  <div class="w3-container w3-black">
    <h5>Ruangku. Collaborate to create. </h5>
  </div>


</body>

</html>
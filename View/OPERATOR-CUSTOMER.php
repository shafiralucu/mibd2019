<?php 
	require "../Controller/Connector.php";
	$query = "SELECT * from pelanggan";

	//filter
	$name = "";
	if (isset($_GET['btnSearch'])) {
		$name = $_GET['search'];
		if (isset($name) && $name != "") {
			$name = $db->escapeString($name);
            $query .= " WHERE nama LIKE '%$name%'";      
		}
	}

    $result = $db->executeSelectQuery($query);
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>List Customer - RUANGKU</title>

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
      src: url("fonts/Helvetica.ttf");
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
      font-family: navbarFont;
      font-size: 25px;
      color: #868B8E;
      font-style: bold;
    }


    h2 {
      font-family: navBarFont;
      font-size: 30px;
      color: #373737;
      margin-top: 75px;
      margin-bottom: 75px;
    }

    h5 {
      font-family: navbarFont;
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

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: black;
      color: white;
      text-align: center;
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
    <a href="OPERATOR-TRANSAKSI1.php" class="w3-bar-item w3-button">TRANSAKSI</a>
    <a href="OPERATOR-ALAT.php" class="w3-bar-item w3-button">LIST BARANG</a>
    <a href="OPERATOR-CUSTOMER.php" class="w3-bar-item w3-button w3-dark-grey">LIST CUSTOMER</a>
    <a href="OPERATOR-HOME.php" class="w3-bar-item w3-button" style="float: right;">LOGOUT</a>
    <div class="search-container">
      <form action="OPERATOR-CUSTOMER.php" method="GET">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit" name="btnSearch">
          <i class="fa fa-search"></i>
        </button>
      </form>
    </div>
  </div>

  <div class="w3-container" style="margin: 3%;">
    <table class="w3-table-all w3-center w3-hoverable" id="tabelcust" style="font-family: texts; font-size: 20px;">
      <thead>
        <tr class="w3-light-grey">
          <th>ID Pelanggan </th>
          <th>Nama</th>
          <th>No. Handphone</th>
          <th>Alamat</th>
          <th>E-mail</th>
        </tr>
      </thead>
      <?php
			  foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row['idPelanggan']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['no_hp']."</td>";
				echo "</tr>";
			}
		?>
    </table>
  </div>

  <div class="footer">
  <p>Ruangku. Collaborate to Create</p>
</div>  




</body>

</html>
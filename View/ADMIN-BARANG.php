<?php 
	require "../Controller/Connector.php";
	$query = "SELECT * from alat";

	// //filter
	// $name = "";
	// if (isset($_GET['btnSearch'])) {
	// 	$name = $_GET['search'];
	// 	if (isset($name) && $name != "") {
	// 		$name = $db->escapeString($name);
  //           $query .= " WHERE namaAlat LIKE '%$name%'";
            
	// 	}
	// }

	$result = $db->executeSelectQuery($query);
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>BARANG - ADMIN</title>

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
      font-family: navBarFont;
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
      font-family: texts;
      font-size: 20px;
      color: #373737;
    }

    .text {
      font-family: texts2;
      font-size: 25px;
      color: white;
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
  </style>
</head>

<body>
  <!-- header -->
  <div class="w3-container w3-white">
    <h1>Ruangku</h1>
  </div>

  <!-- navigation bar -->
  <div class="w3-bar w3-white w3-border" id="menu">
    <a href="ADMIN-CUSTOMER.php" class="w3-bar-item w3-button">LIST PEGAWAI</a>
    <a href="ADMIN-RUANGAN1.php" class="w3-bar-item w3-button">LIST RUANGAN</a>
    <a href="ADMIN-BARANG.php" class="w3-bar-item w3-button w3-dark-grey">LIST BARANG</a>
    <a href="OPERATOR-HOME.php" class="w3-bar-item w3-button" style="float: right;">LOGOUT</a>
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>


<div class="w3-container" id="containerRuang">
            <a class="w3-btn w3-black w3-display-topleft" onclick="document.getElementById('id01').style.display='block'"
            style="width:auto; margin-top: 11%; margin-left: 2%;" href="#">INSERT Barang</a>
            <a class="w3-btn w3-black w3-display-topleft" onclick="document.getElementById('id03').style.display='block'"
            style="width:auto; margin-top: 11%; margin-left: 16%;" href="#">UPDATE Barang</a>
            <a class="w3-btn w3-black w3-display-topleft" onclick="document.getElementById('id02').style.display='block'"
            style="width:auto; margin-top: 11%; margin-left: 30.5%;" href="#">DELETE Barang</a>
            <br> 
            <br>

<br><br><br><br>


<?php 
  foreach ($result as $key => $row) {
    echo "<tr>";
    echo "<td><img src='images/".$row['imagesAlat']."'></td>";
    echo "<td>".$row['namaAlat']."</td>";
    echo "<td>".$row['tarif']."</td>";
    echo "<td>".$row['jumlah']."</td>";
    echo "<td>".$row['status_booking']."</td>";
    echo "</tr>";
  }
?>


  
  </div>

  <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

            </div>

            <form class="w3-container" action="../Model/insertBarang.php" method="POST" enctype="multipart/form-data">

                <br>
                <label><b>Foto Barang</b></label>
                <input class="w3-input w3-border" type="file" placeholder="Enter Picture" name="uploadImage">
                <label><b>Nama Barang</b></label>
                <input class="w3-input w3-border" type="text" placeholder="Enter Name" name="nama">
                <label><b>Kapasitas</b></label>
                <input class="w3-input w3-border" type="text" placeholder="Enter Capacity" name="kapasitas">
                <label><b>Tarif</b></label>
                <input class="w3-input w3-border" type="text" placeholder="Enter Price" name="harga">
                <br>
                <br>
                <br>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnInsert">Insert</button>
                </div>
            </form>

        </div>


    </div>

    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id02').style.display='none'"
                    class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

            </div>

            <form class="w3-container" action="Model/deleteBarang.php" method="POST">

                <br>
                <label><b>Nama Alat</b></label>
                <input class="w3-input w3-border" type="text" placeholder="Alat yang dihapus" name="nama">
                <br>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name ="btnDelete">Delete</button>
                </div>
            </form>

        </div>


    </div>


  <div class="w3-container w3-black">
    <h5>Ruangku. Collaborate to create. </h5>
  </div>


</body>

</html>
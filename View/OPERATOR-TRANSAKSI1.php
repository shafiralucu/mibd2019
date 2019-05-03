<?php 
	require "../Controller/Connector.php";
	$query = "SELECT * from ruang";

	//filter
	$name = "";
	if (isset($_GET['btnSearch'])) {
		$name = $_GET['search'];
		if (isset($name) && $name != "") {
			$name = $db->escapeString($name);
            $query .= " WHERE namaRuang LIKE '%$name%'";
            
		}
	}

	$result = $db->executeSelectQuery($query);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>TRANSAKSI1 - OPERATOR</title>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-dark-grey.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

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
      color: white;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    h5 {
      font-family: navBarFont;
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

      #tblImg img {
      width: 500px; 
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
  <div class="w3-bar w3-white w3-border " id="menu">
    <a href="OPERATOR-TRANSAKSI1.php" class="w3-bar-item w3-button w3-dark-grey">TRANSAKSI</a>
    <a href="OPERATOR-ALAT.php" class="w3-bar-item w3-button">LIST BARANG</a>
    <a href="OPERATOR-CUSTOMER.php" class="w3-bar-item w3-button">LIST CUSTOMER</a>
    <a href="OPERATOR-HOME.php" class="w3-bar-item w3-button" style="float: right;">LOGOUT</a>
    <div class="search-container">
      <form action="OPERATOR-TRANSAKSI1.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit" name="btnSearch"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>

  <!-- Slideshow untuk ruangan -->
  <div class="slideshow-container" style="margin-top:30px;">
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">

      <img src="images/1.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/2.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/3.png" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/5.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/6.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/7.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/8.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/9.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">

      <img src="images/10.jpg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/11.jpg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/12.jpg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/13.jpeg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/14.jpeg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/15.jpeg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/16.jpg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/17.jpeg" style="width:100%">
      </a>
    </div>

    <div class="mySlides fade">

      <img src="images/18.jpg" style="width:100%">
      </a>
    </div>


    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <br>


  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
    <span class="dot" onclick="currentSlide(7)"></span>
    <span class="dot" onclick="currentSlide(8)"></span>
    <span class="dot" onclick="currentSlide(9)"></span>
    <span class="dot" onclick="currentSlide(10)"></span>
    <span class="dot" onclick="currentSlide(11)"></span>
    <span class="dot" onclick="currentSlide(12)"></span>
    <span class="dot" onclick="currentSlide(13)"></span>
    <span class="dot" onclick="currentSlide(14)"></span>
    <span class="dot" onclick="currentSlide(15)"></span>
    <span class="dot" onclick="currentSlide(16)"></span>
    <span class="dot" onclick="currentSlide(17)"></span>
    <span class="dot" onclick="currentSlide(18)"></span>
  </div>

  <br>
  <br>

  <div class="w3-container w3-center w3-dark-grey ">
    <h2>Ruangku. A place to collaborate and create. <br>
      SERVICED OFFICE. COWORKING. VIRTUAL OFFICE. MEETING ROOM.</h2>
  </div>

  <br>
  <br>


  <div class="w3-container" id="containerRuang">

  

  <?php include "../Model/pagination2.php" ?>
  <table id = "tblImg" class="w3-table w3-bordered w3-center">
  <a class="w3-btn w3-black w3-xxlarge" onclick="document.getElementById('id01').style.display='block'" 
            style="width:auto; margin-top: 1%; margin-left:45%; margin-bottom: 5%;float: left;" href="#">Booking</a>
            <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kapasitas</th>
            <th>Fasilitas</th>
            <th>Tarif</th>
            <th>Status Booking</th>
            <?php 
              foreach ($result as $key => $row) {
                echo "<tr>";
                echo "<td>".$row['idRuang']."</td>";
                echo "<td><img src='images/".$row['imagesRuang']."'></td>";
                echo "<td>".$row['namaRuang']."</td>";
                echo "<td>".$row['kapasitas']."</td>";
                echo "<td>".$row['fasilitas']."</td>";
                echo "<td>".$row['tarif']."</td>";
                echo "<td>".$row['status_booking']."</td>";
                echo "</tr>";
              }
            ?>
  </table>
        
    <br>
  </div>

  <!-- modal untuk daftar cust -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'"
          class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

      </div>

      <form class="w3-container" action="../Model/insertTransaksiOP.php" method="POST">
        <div class="w3-section">
          <label><b>Tanggal Transaksi</b></label> <br>
         <p> <?php 
         date_default_timezone_set("Asia/Bangkok");
         $my_date = date("Y-m-d H:i:s");
         echo $my_date; ?> </p> <br>
          <label><b>Ruangan</b></label>
          <br>
          <input class="w3-input w3-border" type="text" placeholder="Enter Ruangan" name="ruangan" required>
          <label><b>Nama</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Name" name="nama" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Email" name="email" required>
          <label><b>No.Handphone</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Phone Number" name="nohp" required>
          <label><b>Alamat</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Address" name="address" required> <br>
          <label><b>Waktu Mulai</b></label>
          <input type="text" name="waktu_mulai" style="width:20%; margin-right: 10%;">
          <label><b>Waktu Akhir</b></label>
          <input type="text" name="waktu_akhir" style="width:20%;">
          <br> <br>
          <label class="heading">Sewa Alat:</label> <br>
          <input type="checkbox" name="check_list[]" value="laptop">Laptop <br>
          <input type="checkbox" name="check_list[]" value="microphone">Microphone (2pcs) <br>
          <input type="checkbox" name="check_list[]"value="proyektor">Proyektor <br>
          <input type="checkbox" name="check_list[]" value="radio">Spidol (2pcs) <br>
          <input type="checkbox" name="check_list[]" value="speaker">Speaker <br>
          <input type="checkbox" name="check_list[]" value="whiteboard">Whiteboard <br>
          <br>

          <!-- <center>
            <label><b>Total Transaksi: </b></label>
            <br>
            <label id="total" style="font-size: 30px">150.000</label>
            <br>
          </center> -->

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnBook">Booking</button>
      </div>

        </div>
      </form>

    </div>
  </div>


  <div class="w3-container w3-black">
    <h5>Ruangku. Collaborate to create. </h5>
  </div>


  <script>
    //tampilkan carousel
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1 }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

    // tampilkan date
    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = y + "/" + m + "/" + d;

    var timepicker = new TimePicker('time', {
      lang: 'en',
      theme: 'dark'
    });
    timepicker.on('change', function(evt) {
      
      var value = (evt.hour || '00') + ':' + (evt.minute || '00');
      evt.element.value = value;

    });

  </script>
</body>

</html>
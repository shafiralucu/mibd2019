<?php
    require 'Connector.php';
		if (isset($_POST['btnDelete'])) {
            $namaBarang = $_POST['nama'];
            $namaBarang = $db->escapeString($namaBarang);
			$query ="DELETE FROM alat WHERE namaAlat = '$namaBarang'";
            $db->executeNonSelectedQuery($query);
            header('Location: ../ADMIN-BARANG.php');
        }
?>
<?php
	@ob_start();
	session_start();
    
    require_once 'vendor/satuduasatu/SQLID/src/detector.php';
	require 'config.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tipe = $_POST['tipe'];
    $gambar = $_FILES['gambar']['name'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    $target_dir = "fileupload/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);    

    $sql = "UPDATE barang SET nama_barang='". $nama . "', jumlah='" . $jumlah . "', keterangan='" . $keterangan . "', tipe='" . $tipe . "', tanggal='" . $tanggal . "', gambar='" . $gambar ."' WHERE id = " . $id . ";";
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (mysqli_query($conn, $sql)) {
        echo '<script>window.location="inventory.php"</script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
?>
<?php
	@ob_start();
	session_start();
    
  require_once 'vendor/satuduasatu/SQLID/src/detector.php';

$submitValue = isset($_POST['submitValue']) ? $_POST['submitValue'] : '';

// Check if a SQL injection was detected
if ($submitValue === '1') {
    // SQL injection detected, handle accordingly
    echo "SQL injection detected!";
    // Perform actions to handle SQL injection, such as logging, blocking the request, or displaying an error message
} else {
    // No SQL injection detected, proceed with normal processing
    // Process the form submission and perform necessary actions
    // ...

	require 'config.php';
    $login_id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tipe = $_POST['tipe'];
    $tanggal = $_POST['tanggal'];
    $gambar = $_FILES['gambar']['name'];
    $keterangan = $_POST['keterangan'];

    $data[] = $login_id;
    $data[] = $nama;
    $data[] = $jumlah;
    $data[] = $tipe;
    $data[] = $tanggal;
    $data[] = $gambar;
    $data[] = $keterangan;

    $target_dir = "fileupload/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $sql = "INSERT INTO barang (login_id, nama_barang, jumlah, tipe, tanggal, gambar, keterangan) VALUES(?,?,?,?,?,?,?)";
    $row = $config -> prepare($sql);
    $row -> execute($data);

    echo '<script>window.location="inventory.php"</script>';
    
}

?>
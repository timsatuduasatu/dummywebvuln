<?php
	@ob_start();
	session_start();
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
?>
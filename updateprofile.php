<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data[] = $nama;
    $data[] = $alamat;
    $data[] = $username;
    $data[] = $password;
    $data[] = $id;

    $sql = 'UPDATE login SET nama=?, alamat=?, username=?, password=? WHERE id = ?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="app.php"</script>';
?>
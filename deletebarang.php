<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM barang WHERE id='$id'";
    $row = $config -> query($sql);
    echo '<script>window.location="inventory.php"</script>';
?>
<?php
date_default_timezone_set("Asia/Jakarta");
	$host 	= 'localhost'; 
	$user 	= 'root';  
	$pass 	= 'root'; 
	$dbname = 'inventory'; 
	
	try{
		$config = new mysqli($host, $user, $pass, $dbname);
		//echo 'sukses';
	}catch(PDOException $e){
		echo 'KONEKSI GAGAL' .$e -> getMessage();
	}
?>


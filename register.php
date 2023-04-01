<?php
	@ob_start();
	session_start();
    require 'config.php';

    if(isset($_SESSION['login'])){
        echo '<script>window.location="app.php"</script>';
    }else if(isset($_POST['submit'])){			
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];			
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO login (nama, alamat, username, password) VALUES ('$nama', '$alamat', '$username', '$password')";
        $res = $config->query($sql) or die(mysqli_error($config));
        if($res){
          echo '<script>alert("Register Sukses");window.location="index.php"</script>';
        }        
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Registrasi</title>
</head>
<body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Inventory</span></div>
        <form method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="nama" placeholder="Nama" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="alamat" placeholder="Alamat" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Daftar" name="submit">
          </div>
          <div class="signup-link">Sudah Punya Akun ? <a href="index.php">Login</a></div>
        </form>
      </div>
    </div>
</body>
</html>
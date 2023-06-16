<?php
	@ob_start();
	session_start();

 if(isset($_POST['submit'])){
   
  require_once 'vendor/satuduasatu/SQLID/src/detector.php';

  require 'config.php';

    if(isset($_SESSION['login'])){
        echo '<script>window.location="app.php"</script>';
    }else if(isset($_POST['submit'])){			
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];			
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO login (nama, alamat, username, password, role) VALUES ('$nama', '$alamat', '$username', '$password', 'user')";
        $res = $config->query($sql) or die(mysqli_error($config));
        if($res){
          echo '<script>alert("Register Sukses");window.location="index.php"</script>';
        }        
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
    <style>
      {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 5vh;
        background-color: #f5f5f5;
      }

      .wrapper {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
      }

      .title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }

      form {
        margin-top: 20px;
      }

      .row {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
      }

      .row i {
        margin-right: 10px;
      }

      .row input[type="text"],
      .row input[type="password"] {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        font-size: 16px;
      }

      .button {
        text-align: center;
      }

      .button input[type="submit"] {
        padding: 10px 20px;
        background-color: #114097;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }

      .signup-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
      }

      .signup-link a {
        color: #114097;
        text-decoration: none;
      }

      /* Responsive styles */
      @media screen and (max-width: 400px) {
        .wrapper {
          max-width: 300px;
        }
      }
      
      .title span {
        font-size: 20px;
      }
    </style>
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

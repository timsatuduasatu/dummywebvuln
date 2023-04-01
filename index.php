<?php
	@ob_start();
	session_start();
	if(isset($_POST['submit'])){
		require 'config.php';
			
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "select username, password, id
				from login where username ='$user' and password = '$pass'";
		$row = $config->query($sql) or die(mysqli_error($config));
		if($row->num_rows > 0){
			$hasil = $row -> fetch_assoc();
			$_SESSION['login'] = $hasil['username'];
			$_SESSION['id'] = $hasil['id'];
			echo '<script>alert("Login Sukses");window.location="app.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
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
    <title>Login</title>
</head>
<body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Inventory App</span></div>
        <form method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="user" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login" name="submit">
          </div>
          <div class="signup-link">Belum Punya Akun ? <a href="register.php">Daftar</a></div>
        </form>
      </div>
    </div>
</body>
</html>
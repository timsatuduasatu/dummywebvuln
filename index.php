  <?php
  @ob_start();
  session_start();
  
  if (isset($_POST['submit'])) {
    require_once 'vendor/satuduasatu/SQLID/src/detector.php';
    require 'config.php';
  
    $user = $_POST['user'];
    $pass = $_POST['pass'];
  
    $sql = "SELECT username, password, id, role 
            FROM login
            WHERE username = '$user' AND password = '$pass'";
  
    $result = $config->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $hasil = $result->fetch_assoc();
      $_SESSION['login'] = $hasil['username'];
      $_SESSION['id'] = $hasil['id'];
      $_SESSION['role'] = $hasil['role'];
      echo '<script>alert("Login Sukses");window.location="app.php"</script>';
    } else {
      echo '<script>alert("Login Gagal");history.go(-1);</script>';
    }
  
    $config->close();
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
      * {
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
        min-height: 10vh;
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
      @media screen and (max-width: 480px) {
        .wrapper {
          max-width: 300px;
        }
      }
    </style>
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

<?php
	@ob_start();
	session_start();
    require 'config.php';
    $id = $_SESSION['id'];
    $sql = 'select * from login where id =?';
    $row = $config->prepare($sql);
    $row -> execute(array($id));
    $jum = $row -> rowCount();
    if($jum > 0){
        $hasil = $row -> fetch();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/admin-style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #114097;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #164fb9;
        }
    </style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-archive'></i>
      <span class="logo_name">Inventory</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="app.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="inventory.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Inventory</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Profile</span>
      </div>      
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box"> 
            <form method="post" action="updateprofile.php">
                <input type="hidden" name="id" value="<?= $hasil['id'] ?>">
                <div class="sales-details">
                    <label>Nama </label>  
                </div>
                    <input type="text" name="nama" id="nama" value="<?= $hasil['nama'] ?>" required> 
                <div class="sales-details">                 
                    <label>Alamat </label>      
                </div>
                    <input type="text" name="alamat" id="alamat" value="<?= $hasil['alamat'] ?>" required> 
                <div class="sales-details">                   
                    <label>Username </label>
                </div>
                    <input type="text" name="username" id="username" value="<?= $hasil['username'] ?>" required> 
                <div class="sales-details">
                    <label>Password </label>
                </div>
                    <input type="text" name="password" id="password" value="<?= $hasil['password'] ?>" required> 
                <div class="button">
                    <input type="submit" value="Update Profile">
                </div>
            </form>          
        </div>        
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
 </script>

</body>
</html>


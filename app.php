<?php
	@ob_start();
	session_start();
    require 'config.php';
    $id = $_SESSION['id'];
    $sql = "select * from login where id ='$id'";
    $row = $config->query($sql) or die(mysqli_error($config));
    if($row->num_rows > 0){
        $hasil = $row -> fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/admin-style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <div class="sales-details">              
            <label>Nama : <?= $hasil['nama'] ?></label>   
          </div>
          <div class="sales-details">                 
            <label>Alamat : <?= $hasil['alamat'] ?></label>      
          </div>
          <div class="sales-details">                   
            <label>Username : <?= $hasil['username'] ?></label>
          </div>
          <div class="sales-details">
            <label>Password : <?= $hasil['password'] ?></label>
          </div>
          <div class="button">
            <a href="editprofile.php">Edit Profil</a>
          </div>
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


<?php
	@ob_start();
	session_start();
    require 'config.php';
    $id = $_SESSION['id'];
    $sql = 'select * from barang where login_id =?';
    $row = $config->query($sql);
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
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {background-color: #f2f2f2;}

            .edit-button{
                color: #fff;
                background: green;
                padding: 4px 12px;
                font-size: 15px;
                font-weight: 400;
                border-radius: 4px;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .delete-button{
                color: #fff;
                background: red;
                padding: 4px 12px;
                font-size: 15px;
                font-weight: 400;
                border-radius: 4px;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .tambah-button{
                color: #fff;
                background: blue;
                padding: 4px 12px;
                font-size: 15px;
                font-weight: 400;
                border-radius: 4px;
                text-decoration: none;
                transition: all 0.3s ease;
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
          <a href="app.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="inventory.php" class="active">
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
        <span class="dashboard">Inventory</span>
      </div>      
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
        <a href="tambahbarang.php" class="tambah-button">Tambah Barang</a>
            <div style="overflow-x: auto; margin-top:20px;">
                <table>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tipe</th>
                        <th>Tanggal Masuk</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 0; 
                        foreach($hasil as $h){
                    ?>
                    <tr>
                        <td><?= $h['nama_barang'] ?></td>
                        <td><?= $h['jumlah'] ?></td>
                        <td><?= $h['tipe'] ?></td>
                        <td><?= $h['tanggal'] ?></td>
                        <td><img src="fileupload/<?= $h['gambar'] ?>" alt="" width="150"></td>
                        <td><?= $h['keterangan'] ?></td>
                        <td>
                            <a href="editbarang.php?id=<?= $h['id'] ?>" class="edit-button">Edit</a>
                            <a href="deletebarang.php?id=<?= $h['id'] ?>" class="delete-button">Delete</a>
                        </td>
                    </tr> 
                    <?php
                            $no++;
                        }
                    ?>                   
                </table>
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


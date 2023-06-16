
<?php
@ob_start();
session_start();


require 'config.php';

$id = $_SESSION['id'];
$role = $_SESSION['role'];
$sql = 'SELECT * FROM barang';
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($searchTerm)) {
    // Check for SQL injection
    
    require_once 'vendor/satuduasatu/SQLID/src/detector.php';

    $sql .= ' WHERE nama_barang LIKE "%' . $searchTerm . '%"'; // Assuming 'nama_barang' is the column you want to search
}

$result = $config->query($sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/admin-style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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

             /* Responsive styles */
        @media (max-width: 768px) {
            /* Adjust sidebar and main content styles for smaller screens */
            .sidebar {
                width: 100%;
                /* Adjust other styles as needed */
            }

            .home-content {
                margin-left: 0;
                /* Adjust other styles as needed */
            }

            /* Adjust table styles for smaller screens */
            table {
                font-size: 12px;
                /* Adjust other styles as needed */
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
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
                    <?php
                        if($role == 'admin'){
                            echo '<a href="tambahbarang.php" class="tambah-button">Tambah Barang</a>';
                        }
                    ?>
                    <form method="GET" action="inventory.php">
                        <div class="search-bar">
                            <input type="text" name="search" placeholder="Search">
                            <button class="tambah-button" type="submit" name="submit">Cari</button>
                        </div>
                    </form>
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
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Output the table rows
                                    ?>
                                    <tr>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['tipe'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><img src="fileupload/<?= $row['gambar'] ?>" alt="" width="150"></td>
                                        <td><?= $row['keterangan'] ?></td>
                                        <td>
                                            <a href="editbarang.php?id=<?= $row['id'] ?>" class="edit-button">Edit</a>
                                            <a href="deletebarang.php?id=<?= $row['id'] ?>" class="delete-button">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $result->close();
                            } else {
                                // No results found
                                ?>
                                <tr>
                                    <td colspan="7">No results found.</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>
</body>
</html>

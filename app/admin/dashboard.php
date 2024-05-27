<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../../asset/css/admdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include './template/sidebar.php'; ?>

        <!-- Button to hide sidebar -->
        <button id="sidebarToggleOutside" class="outside hidden">
        <div class="manual-list-icon">
            <span></span>
        </div>
        </button>

        <!-- Navbar -->
        <div id="content">
            <?php include './template/navbar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <h2>Selamat Datang <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <div class="info-cards">
                    <div class="info-card">
                        <i class="bi bi-people-fill"></i>
                        <h3>Data Pengunjung</h3>
                        <a href="#" class="details-link">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-ticket-fill"></i>
                        <h3>Data Pembelian Tiket</h3>
                        <a href="#" class="details-link">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-currency-dollar"></i>
                        <h3>Harga Tiket</h3>
                        <a href="#" class="details-link">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="info-card">
                        <i class="bi bi-graph-up"></i>
                        <h3>Laporan Pendapatan</h3>
                        <a href="#" class="details-link">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../other/admin/script.js"></script>
</body>
</html>

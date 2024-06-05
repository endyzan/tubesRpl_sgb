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
        <div class="wrapper-dsh">
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
            <div class="main-content-dsh">
                <h2>Selamat Datang <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <div class="info-cards">
                    <!-- <div class="info-card"> -->
                        <div class="icbg-dp">
                            <div class="info-card-header">
                                <i class="bi bi-people-fill data-pengunjung"></i>
                                <div class="ic-data-pengunjung">
                                    <h3>Data Pengunjung</h3>
                                </div>
                            </div>
                            <a href="data_pengunjung.php" class="details-link"><h4>Lihat Detail</h4> <i class="bi bi-arrow-right-circle arrow-lihatdetail"></i></a>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="info-card"> -->
                        <div class="icbg-dpt">
                            <div class="info-card-header">
                                <i class="bi bi-ticket-fill data-pembelian-tiket"></i>
                                <div class="ic-data-pembelian-tiket">
                                    <h3>Data Pembelian Tiket</h3>
                                </div>
                            </div>
                            <a href="data_pembelian_tiket.php" class="details-link"><h4>Lihat Detail</h4> <i class="bi bi-arrow-right-circle arrow-lihatdetail"></i></a>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="info-card"> -->
                    <div class="icbg-ht">
                        <div class="info-card-header">
                            <i class="bi bi-currency-dollar harga-tiket"></i>
                            <div class="ic-harga-tiket">
                                <h3>Harga Tiket</h3>
                            </div>
                        </div>
                        <a href="harga_tiket.php" class="details-link"><h4>Lihat Detail</h4> <i class="bi bi-arrow-right-circle arrow-lihatdetail"></i></a>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="info-card"> -->
                        <div class="icbg-lp">
                            <div class="info-card-header">
                                <i class="bi bi-graph-up laporan-pendapatan"></i>
                                <div class="ic-laporan-pendapatan">
                                    <h3>Laporan Pendapatan</h3>
                                </div>
                            </div>
                            <a href="laporan_pendapatan.php" class="details-link"><h4>Lihat Detail</h4> <i class="bi bi-arrow-right-circle panah-lihat-detail"></i></a>
                        </div>
                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>

    <script src="../../other/admin/script.js"></script>
</body>
</html>
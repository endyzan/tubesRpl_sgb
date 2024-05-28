<?php
// Periksa apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="../../../asset/css/admdashboard.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h3>Stadion Glora Bangkalan</h3>
                <button id="sidebarToggle" class="inside">
                <div class="manual-list-icon">
                    <span></span>
                </div>
                </button>
            </div>
            <ul class="list-unstyled components">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                ?>
                <li class="<?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">
                    <a href="dashboard.php">
                        <i class="bi bi-house-fill"></i> Dashboard
                    </a>
                </li>
                <li class="<?= ($current_page == 'data_pengunjung.php') ? 'active' : '' ?>">
                    <a href="data_pengunjung.php">
                        <i class="bi bi-people-fill"></i> Data Pengunjung
                    </a>
                </li>
                <li class="<?= ($current_page == 'data_pembelian_tiket.php') ? 'active' : '' ?>">
                    <a href="data_pembelian_tiket.php">
                        <i class="bi bi-pie-chart-fill"></i> Data Pembelian Tiket
                    </a>
                </li>
                <li class="<?= ($current_page == 'harga_tiket.php') ? 'active' : '' ?>">
                    <a href="harga_tiket.php">
                        <i class="bi bi-ticket-detailed"></i> Harga Tiket
                    </a>
                </li>
                <li class="<?= ($current_page == 'laporan_pendapatan.php') ? 'active' : '' ?>">
                    <a href="laporan_pendapatan.php">
                        <i class="bi bi-cash-stack"></i> Laporan Pendapatan
                    </a>
                </li>
                
            </ul>
        </nav>
    </body>
</html>
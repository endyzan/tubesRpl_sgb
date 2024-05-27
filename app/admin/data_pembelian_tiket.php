<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pembelian Tiket</title>
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
                <h2>Data Pembelian Tiket</h2>
                <p>coming soon.</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

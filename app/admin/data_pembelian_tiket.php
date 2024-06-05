<?php 
session_start();
include './../base.php'; // Ensure this path is correct

try {
    // Fetch data from the database
    $stmt = $db->query("SELECT * FROM pemesanan_ticketh");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function formatRupiah($number) {
    return 'Rp. ' . number_format($number, 0, ',', '.') . ',00';
}
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
    <div class="wrapper-dpt">
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
            <div class="main-content-dpt">
                <h2>Data Pembelian Tiket</h2>
                <div class="table-container">
                    <table id="tbl-dpt">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nomor Invoice</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Jumlah Tiket</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            foreach ($orders as $order) { 
                            ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td><?php echo $order['kode_booking']; ?></td>
                                <td><?php echo $order['tanggal']; ?></td>
                                <td><?php echo $order['tanggal']; ?></td> <!-- Assuming 'tanggal' is the visit date -->
                                <td><?php echo $order['jumlah']; ?></td>
                                <td><?php echo formatRupiah($order['total_tagihan']); ?></td>
                                <td><?php echo $order['status'] == '1' ? 'Sudah dibayar' : 'Belum dibayar'; ?></td>
                                <td>
                                    <?php if ($order['status'] == '0') { ?>
                                    <form method="POST" action="update_status.php" class="status-form">
                                        <input type="hidden" name="kode_booking" value="<?php echo $order['kode_booking']; ?>">
                                        <button type="submit" class="btn btn-primary">ACC</button>
                                    </form>
                                    <?php } else { ?>
                                        <button class="btn not-allowed-cursor" disabled>ACC</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="../../other/admin/script.js"></script>
</body>
</html>

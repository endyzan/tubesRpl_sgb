<?php 
session_start();
include './../base.php'; // Ensure this path is correct

try {
    // Fetch data from the database
    $stmt = $db->query("SELECT * FROM permainan");
    $permainan = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Admin - Harga Tiket</title>
    <link rel="stylesheet" href="../../asset/css/admdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="wrapper-ht">
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
            <div class="main-content-ht">
                <h2>Harga Tiket</h2>
                <h3>Harga Tiket Masuk : IDR 5.000,00</h3>

                <div class="table-container-ht">

                    <table id="tbl-ht">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Wahana</th>
                                <th>Harga</th>
                                <th>Waktu Bermain</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            foreach ($permainan as $row) { 
                            ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td id="wahana-ht"><?php echo $row['nama_permainan']; ?></td>
                                <td><?php echo formatRupiah($row['harga']); ?></td>
                                <td id="waktu-bermain-ht"><?php echo $row['durasi'] . " Menit"; ?></td>
                                <td>
                                    <form method="GET" action="edit_permainan.php">
                                        <input type="hidden" name="id_permainan" value="<?php echo $row['id_permainan']; ?>">
                                        <button type="submit" class="btn btn-warning">EDIT</button>
                                    </form>
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

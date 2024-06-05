<?php
session_start();
include './../base.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_booking = $_POST['kode_booking'];

    try {
        $stmt = $db->prepare("UPDATE pemesanan_ticketh SET status = 1 WHERE kode_booking = :kode_booking");
        $stmt->bindParam(':kode_booking', $kode_booking);
        $stmt->execute();
        header('Location: data_pembelian_tiket.php'); // Redirect back to the data pembelian tiket page
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota Ticket</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
</head>
<body>
    <?php
    session_start();
    try {
        require_once "../base.php";

        // Query untuk mendapatkan data pembeli dan tiket
        $pembeliQuery = $db->prepare("SELECT p.nama_pembeli, p.kota, p.nohp_pembeli, p.email_pembeli FROM pembeli p,pemesanan_ticketH WHERE p.id_pembeli = pemesanan_ticketH.id_pembeli  and pemesanan_ticketH.kode_booking = '{$_SESSION['kodebooking']}'");
        $pembeliQuery->execute();
        $pembeli = $pembeliQuery->fetch(PDO::FETCH_ASSOC);
        $tiketQuery = $db->prepare("SELECT * FROM pemesanan_ticketH WHERE kode_booking = '{$_SESSION['kodebooking']}'");
        $tiketQuery->execute();
        $tiket = $tiketQuery->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $err) {
        echo "Connection Failed: " . $err->getMessage();
    }
    ?>

    <div class="nota-container">
        <div class="header-nota"><div class="judulheader">Stadion Gelora<br> Bangkalan</div></div>

        <div class="section-title"><div class="blacktext">Personal Information</div></div>
        <div class="content-nota">
            <p>Nama: <?php echo htmlspecialchars($pembeli['nama_pembeli']); ?></p>
            <p>Kota: <?php echo htmlspecialchars($pembeli['kota']); ?></p>
            <p>NoHp: <?php echo htmlspecialchars($pembeli['nohp_pembeli']); ?></p>
            <p>Email: <?php echo htmlspecialchars($pembeli['email_pembeli']); ?></p>
        </div>

        <div class="section-title"><div class="blacktext">Informasi Ticket Masuk</div></div>
        <div class="content-nota">
            <p>Kode Booking: <?php echo htmlspecialchars($tiket['kode_booking']); ?></p>
            <p>Tanggal: <?php echo htmlspecialchars($tiket['tanggal']); ?></p>
            <p>Jumlah: <?php echo htmlspecialchars($tiket['jumlah']); ?></p>
            <p>Status: <?php echo htmlspecialchars($tiket['status']); ?></p>
        </div>

        <div class="terms">
            <p><b>Syarat dan Ketentuan:</b></p>
            <p>1. Termasuk tiket Stadion Gelora Bangkalan</p>
            <p>2. Tiket Berlaku sesuai tanggal kunjungan yang telah dipilih</p>
            <p>3. Tiket berlaku di semua hari, weekday dan weekend</p>
            <p>4. Tiket yang dibeli bersifat tetap.</p>
            <p>5. Tiket hanya dapat digunakan sampai batas waktu yang telah ditentukan</p>
            <p>6. Pengunjung tidak dapat memperpanjang masa berlaku tiket</p>
            <p>7. Tiket hanya berlaku untuk satu kali kunjungan</p>
            <p>8. Tiket tidak dapat dibatalkan atau refund</p>
            <p>9. Tiket tidak dapat di reschedule</p>
        </div>

        <div class="footer-nota">
            Stadion Gelora Bangkalan<br>
            Jl. Soekarno Hatta, Wr 08, Mlajah, Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116 Indonesia
        </div>
    </div>

    
        <form method="post" action="downloadnota.php">
            <div class='btn-submit-container'><button type="submit" name="download_pdf">Download PDF</button></div>
        </form>
</body>
</html>

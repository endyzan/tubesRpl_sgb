<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

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

if (isset($_POST['download_pdf'])) {
    $dompdf = new Dompdf();
    ob_start();
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Nota Ticket</title>
        <style>
            body {
                font-family: Helvetica;
                background-color: #ffffff;
                margin: 0;
                padding: 2%;
            }

            .nota-container {
                border: 1px solid #000;
                max-width: 800px;
                margin: auto;
            }
            .header-nota , .footer-nota {
                background-color: #28a745;
                color: rgb(0, 0, 0);
                padding: 10px;
                text-align: left;
                margin-bottom: 20px;
                min-height: 50px;
            }
            .judulheader{
                font-family: 'Times New Roman';
                font-size: 25px;
            }
            .section-title{
                background-color: #28a745;
                color: rgb(0, 0, 0);
                padding: 10px;
                text-align: left;
                margin: 0 5% 0 5%;
                max-width: 90%;
            }
            .content-nota {
                padding: 10px 10px 10px 5%;
            }
            .content-nota p {
                margin: 5px 0;
            }
            .terms {
                margin-top: 20px;
                padding-left: 1em;
                margin-bottom: 5%;
            }
            .terms p {
                margin: 5px 0;
            }
            .blacktext {
                color: rgb(0, 0, 0); 
                text-shadow:2px 2px 4px rgba(0, 0, 0, 0.4);
                flex: 1;
                padding: 10px 1px; /* Allows the content to take the remaining space */
            }
        </style>
    </head>
    
    <body>
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
    </body>
    </html>

    <?php
    $html = ob_get_clean();

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("nota_ticket.pdf", ["Attachment" => 1]);
    exit;
    
}
?>

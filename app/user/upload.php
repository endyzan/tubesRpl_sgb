<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require __DIR__ . '/vendor/autoload.php'; // Menggunakan autoloader dari Composer

if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Membuat direktori 'uploads' jika belum ada
    }
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    echo "<div class='curved-box-title'>KONFIRMASI PEMBAYARAN</div>
    <div class='kotakabuabubesar'>
        <div class='left-box'>";
    
    if($check !== false) {
        echo "<div class='blacktext'>Tunggu Waktu Konfirmasi Pembayaran<br><br> Max 24jam atau  <img src='https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png' alt='WhatsApp' class='whatsapp-logo'> <a href='https://wa.me/6281235304501'>Hubungi Admin</a> </div>";

        // Unggah file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


            // Kirim email dengan lampiran menggunakan PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Pengaturan server
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';             // Gunakan SMTP Gmail
                $mail->SMTPAuth   = true;
                $mail->Username   = 'pemrogramandesktopteam@gmail.com';       // Ganti dengan email Anda
                $mail->Password   = 'spmw bqmy kqfo yowq';        // Ganti dengan password email Anda
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Penerima
                $mail->setFrom('pemrogramandesktopteam@gmail.com', 'Betadata03');
                $mail->addAddress('220411100097@student.trunojoyo.ac.id', 'Betadata'); // Email tujuan

                // Lampiran
                $mail->addAttachment($target_file);

                // Konten email
                $mail->isHTML(true);
                $mail->Subject = 'Bukti Pembayaran';
                $mail->Body    = "Kode Booking : {$_POST['kodebooking']}";

                $mail->send();

            } catch (Exception $e) {
                echo "<div class='blacktext'>Email tidak dapat dikirim.</div> Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "<div class='blacktext'>Maaf, terjadi kesalahan saat mengunggah file Anda.</div>";
        }
    } else {
        echo "<div class='blacktext'>File bukan gambar.</div>";
    }
    echo '
        </div>
        <form action="statuspembayaran.php" method="POST">
        <div class="btn-submit-container"><input type="submit" value="Cek Status Pembayaran" name="cekstatus"></div>
        </form>
    </div>';
}
?>

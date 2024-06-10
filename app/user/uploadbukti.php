<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    require_once "../base.php";
    if (isset($_POST['pilih_bank'])) {
            $id_bank = $_POST['bank'];
            // var_dump($id_bank);
            // var_dump($_SESSION['kodebooking']);

            $updateBank = $db->prepare("UPDATE pemesanan_ticketH SET id_bank = :id_bank WHERE kode_booking = :kode_booking");
            $updateBank->bindValue(':id_bank', $id_bank);
            $updateBank->bindValue(':kode_booking', $_SESSION['kodebooking']);
            $updateBank->execute();
        }
    echo '<body>
    <!-- Header Start -->
    <div class="header">
        <div class="logo">
            <img src="../../asset/img/logoSGB.jpg" alt="LOGO SGB">
        </div>

        <!-- Menu Start -->
        <div class="menu">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="permainan.php">PERMAINAN</a></li>
                <li><a href="event.php">EVENT</a></li>
                <li>
                    <a>PROFIL</a>
                    <ul>
                        <li><a href="profil_kami.php">PROFIL KAMI</a></li>
                        <li><a href="galeri_foto.php">GALERI</a></li>
                    </ul>
                </li>
                <li><a href="fasilitas.php">FASILITAS</a></li>
                <li><a href="t&c.php">T & C</a></li>
                <li><a href="formulirbooking.php">BOOKING TICKET</a></li>
            </ul>
        </div>
        <!-- Menu End -->
    </div>
    <!-- Header Start -->';

    echo "<div class = 'isi'>";
        echo "<form action='upload.php' method='post' enctype='multipart/form-data'>

                <div class='curved-box-title'>UPLOAD BUKTI PEMBAYARAN</div>
                    <div class='kotakabuabubesar'>
                        <div class='left-box'><input type='file' name='image' accept='image/*' required></div>
                        <input type='hidden' name='kodebooking' id='kodebooking' value='{$_SESSION['kodebooking']}'>
                        <div class='btn-submit-container'><input type='submit' value='Upload Gambar' name='submit'></div>
                    </div>
        
            
        </form> ";
    echo "</div>";

    echo '
    <div class="sticky-whatsapp2">
        <a href="https://wa.me/+6287853053661" target="_blank">
            <img src="../../asset/img/logo_WA.png" alt="WhatsApp" class="whatsapp-logo">
        </a>
    </div>

    <div class="container2">
        <div class="section1">
            <h2>About Us</h2>
            <hr>
            <div class="links">
                <a href="profil_kami.php">PROFIL KAMI</a>
                <a href="t&c.php">T & C</a>
                <a href="formulirbooking.php">BOOKING TICKET</a>
            </div>
        </div>
        <div class="section">
            <h2>Follow Us</h2>
            <hr>
            <div class="social-icons">
                <a href="https://www.facebook.com/login.php"><img src="../../asset/img/fc.png" alt="Facebook"></a>
                <a href="https://x.com/"><img src="../../asset/img/tweet.png" alt="Twitter"></a>
                <a href="https://www.instagram.com/"><img src="../../asset/img/ig.png" alt="Instagram"></a>
                <a href="https://www.youtube.com/"><img src="../../asset/img/youtube.png" alt="YouTube"></a>
            </div>
        </div>
    </div>

    <div class="footer2" id="footer">
        <p>&copy; Copyright 2023 | Created By Kelompok_5</p>
    </div>';

    echo '
    </body>';
?>

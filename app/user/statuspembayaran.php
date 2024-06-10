<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    try{
        require_once "../base.php";
        if(isset($_POST["cekstatus"])){
            $status = $db->prepare("SELECT status from pemesanan_ticketH where kode_booking = '{$_SESSION['kodebooking']}'");
            $status->execute();
            $status = $status->fetchAll(PDO::FETCH_ASSOC);
            echo '
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
                echo "<div class='curved-box-title'>KONFIRMASI PEMBAYARAN</div>
                        <div class='kotakabuabubesar'>
                            <div class='left-box'>";
                if ($status[0]["status"]=="1"){
                    echo "<form action='nota.php' method='POST'>
                    <div class='blacktext'>Horee... Pembayaranmu Sudah Berhasil !</div>
                        <div class='btn-submit-container'><input type='submit' value='Lihat Nota' name='viewnota'></div>
                    </form>";
                }
                else{
                    echo"<div class='blacktext'>Pembayaran Belum Terkonfirmasi <img src='https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png' alt='WhatsApp' class='whatsapp-logo'> <a href='https://wa.me/6281235304501'>Hubungi Admin</a></div>";
                    echo '<form action="statuspembayaran.php" method="POST">
            <div class="btn-submit-container"><input type="submit" value="Refresh" name="cekstatus"></div>
            </form>';
                }
                echo "</div>
                </div>";
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
        }
    }
    catch(PDOException $err){
        echo "Connecting Failed" . $err->getMessage();
    }


?>

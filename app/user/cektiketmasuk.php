<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Ticket</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!--Link ke file CSS eksternal-->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 120px; /* Sesuaikan dengan tinggi header */
            padding-bottom: 60px; /* Sesuaikan dengan tinggi footer jika diperlukan */
        }

        /* ---------------------------------Header Start--------------------------------- */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            position: fixed; /* Ganti dari absolute ke fixed */
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            z-index: 1000; /* Tambahkan z-index untuk memastikan header berada di atas elemen lainnya */
        }
        .logo {
            display: flex;
            width: 120px;
            height: 120px;
        }
        /* ---------------------------------Header End--------------------------------- */

        /* ---------------------------------Menu Start--------------------------------- */
        .menu ul {
            list-style: none;
        }
        .menu ul li {
            position: relative;
            float: left;
        }
        .menu ul li a {
            color: black;
            font-size: 1.3rem;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            display: block;
            padding: 27px;
            font-weight: bold;
        }
        .menu ul li ul {
            position: absolute;
            background: #D3D3D3;
            display: none;
            width: max-content;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .menu ul li ul li {
            border-top: 1px solid rgba(207, 205, 205, 0.384);
            position: left;
        }

        .menu ul li ul li a {
            font-size: 0.8rem;
            padding: 10px 20px;
            position: left;
        }
        .menu ul li ul li:not(:last-child)::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: black;
        }
        .menu ul li:hover > ul {
            display: flex;
            flex-direction: column;
        }
        .menu a:hover {
            color: red;
        }
        .menu a::after {
            content: "";
            border-bottom: 0.1rem solid black;
            display: block;
            padding-bottom: 0.5rem;
            transform: scaleX(0);
        }
        .menu a:hover::after {
            transform: scaleX(1.0);
            transition: 0.2s linear;
        }

        .pembuka img {
            width: 100%;
            margin-top: 170px;
        }
        /* ---------------------------------Menu End--------------------------------- */

        .sticky-whatsapp2 {
            position: fixed;
            bottom: 60px;
            right: 0px;
            z-index: 100;
        }

        .sticky-whatsapp2 img {
            width: 80px;
            height: 50px;
        }

        @media (max-width: 768px) {
            .sticky-whatsapp2 img {
                width: 20px;
                height: 20px;
            }
        }

        .container2 {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
        }
        .section {
            display: flex;
            flex-direction: column;
            width: 20%;
        }
        .section1 {
            display: flex;
            flex-direction: column;
            width: 40%;
            margin-left: 700px;
            
        }
        .section h2 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 24px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .section1 h2 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 24px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            
        }
        .links {
            display: flex;
            gap: 20px; 
        }
        .links a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .social-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .social-icons a {
            text-decoration: none;
            color: #000;
            font-size: 24px;
        }
        .section hr {
            border: 0;
            height: 3px; 
            background: #000; 
            margin-top: 1px;
            margin-bottom: 15px;
            width: 100%;
        }
        .section1 hr {
            border: 0;
            height: 3px; 
            background: #000; 
            margin-top: 1px;
            margin-bottom: 15px;
            width: 90%; 
            margin-left: 0;
        }

        .footer2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 80px;
            position: fixed; /* Ganti dari absolute ke fixed */
            bottom: 0;
            width: 100%;
            z-index: 1000; /* Tambahkan z-index untuk memastikan footer berada di atas elemen lainnya */
        }

        .footer2 p {
            margin: 0;
        }

    </style>
</head>
<body>
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
    <!-- Header Start -->

    <div class = 'isi'>
        <div class='kotakabuabubesar' style="padding-top: 20px;">
            <form action="cektiketmasuk.php" method="POST">
                <label for='kodebook'>Kode Booking :</label>
                <input type="text" name='kodebook' id='kodebook' required>
                <div class='btn-submit-container'><input type="submit" name='cekkodebook' id='cekkodebook' value="CEK"></div>
            </form>
        </div>
    

        <?php
        
        if (isset($_POST['cekkodebook'])){
            try{
                require_once "../base.php";
                
                $cek = $db->prepare("SELECT EXISTS(SELECT 1 FROM pemesanan_ticketH WHERE kode_booking = '{$_POST['kodebook']}')");
                $cek->execute();
                $cek = $cek ->fetchColumn();

                echo "<div class='kotakabuabubesar'>";
                if($cek){
                    $status = $db->prepare("SELECT status FROM pemesanan_ticketH WHERE kode_booking = '{$_POST['kodebook']}'");
                    $status->execute();
                    $status = $status ->fetchColumn();
                    if($status=="1"){
                        $_SESSION['kodebooking'] = $_POST['kodebook'];
                        echo "<form action='nota.php' method='POST'>
                            <div class='btn-submit-container'><input type='submit' value='Download Nota' name='viewnota'></div>
                        </form>
                        <form action='pesanpermainan.php' method='POST'>
                            <div class='btn-submit-container'><input type='submit' value='Pesan Permainan' name='pesanpermainan'></div>
                        </form>";
                    }
                    else{
                        echo "<div class='blacktext'>Ticket Tersebut Belum Terbayarkan</div>";
                    }
                }
                else{
                    echo "<div class='blacktext'>Maaf Kode Booking Tersebut Tidak Ditemukan</div>";
                }
                echo"</div>";

            }
            catch(PDOException $err){
                echo "Connect Fail".$err->getMessage();
            }
        }
        ?>
    </div>

    <div class="sticky-whatsapp2">
        <a href="https://wa.me/+62 878-5305-3661" target="_blank">
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
    </div>
</body>
</html>

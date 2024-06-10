<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Permainan SGB">
        <link rel="stylesheet" href="style/style.css">
        <title>PERMAINAN</title>
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
            }

            /* ---------------------------------Header Start--------------------------------- */
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background: white;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
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

            .menu ul li ul li a{
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
            /* ---------------------------------Menu End--------------------------------- */

            .judul {
                background-color: #000;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin: 2rem auto;
                max-width: 800px;
                border-radius: 40px;
                font-size: 15px;
                margin-top:190px;
            }
            main {
                max-width: 1200px;
                margin: auto;
                background-color: white;
                padding: 2rem;
                border-radius: 10px;

            }
            main h3 {
                margin-bottom: 1.5rem;
            }
            .game {
                display: flex;
                margin-bottom: 2rem;
                border-bottom: 1px solid #ccc;
                padding-bottom: 1rem;
                background-color: #e0e0e0;
                border-radius: 40px;
            }
            .game img {
                width: 500px;
                margin-right: 2rem;
                margin-left: 50px;
                border-radius: 10px;
                object-fit: cover;
                margin-top:30px;
                margin-bottom:10px;
            }
            .game-info {
                max-width: 800px;
                margin-top:30px;
            }

            .game-info strong {
                display: block;
                font-size: 1.2rem;
            }

            .game-info p {
                font-size: 1.0rem;
                padding-right: 40px;
                margin-bottom: 15px;
            }

            .sticky-whatsapp {
                position: fixed;
                bottom: 60px;
                right: 0px;
                z-index: 100;
            }

            .sticky-whatsapp img {
                width: 80px;
            }

            @media (max-width: 768px) {
                .sticky-whatsapp img {
                    width: 20px;
                    height: 20px;
                }
            }

            .container {
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
                margin-left:700px;
                
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
                margin-bottom:15px;
                width: 100%;
            }
            .section1 hr {
                border: 0;
                height: 3px; 
                background: #000; 
                margin-top: 1px;
                margin-bottom:15px;
                width: 90%; 
                margin-left:0;
            }

            .footer {
                background-color: #333;
                color: #fff;
                padding: 10px;
                text-align: center;
                margin-top: 80px;
            }

            .footer p {
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
        <!-- Header End -->
        
        <div class="judul">
            <h1>ZONA PERMAINAN STADION GELORA BANGKALAN</h1>
        </div>
        <main>
            <div class="game">
                <img src="../../asset/img/mobil_listrik.jpg" alt="MOBIL LISTRIK">
                <div class="game-info">
                    <h3>MOBIL LISTRIK</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Permainan mobil listrik anak-anak adalah jenis mainan yang memungkinkan anak-anak merasakan pengalaman mengendarai 
                        mobil mini yang mirip dengan kendaraan sesungguhnya. Mobil listrik ini umumnya dirancang untuk anak-anak berusia antara 
                        3 hingga 8 tahun. </p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>15 Menit</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>-</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 15.000</p>
                </div>
            </div>
            <div class="game">
                <img src="../../asset/img/Melukis.jpg" alt="MELUKIS ANAK-ANAK">
                <div class="game-info">
                    <h3>MELUKIS ANAK-ANAK</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Permainan melukis anak-anak adalah kegiatan kreatif yang melibatkan anak-anak dalam melukis untuk 
                        mengembangkan keterampilan seni.</p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>Sampai lukisan selesai</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>Kursi, cat air, alat lukis (kuas), papan lukis</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 10.000/gambar</p>
                </div>
            </div>
            <div class="game">
                <img src="../../asset/img/istana_boneka.jpg" alt="ISTANA BONEKA">
                <div class="game-info">
                    <h3>ISTANA BONEKA</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Balon istana boneka anak-anak adalah mainan besar yang berbentuk istana, yang dirancang untuk 
                        memberikan ruang bermain yang aman dan menyenangkan bagi anak-anak.</p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>Sepuasnya</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>Playground, mandi bola</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 10.000</p>
                </div>
            </div>
            <div class="game">
                <img src="../../asset/img/mancing.jpg" alt="MANCING MANIA">
                <div class="game-info">
                    <h3>MANCING MANIA</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Mancing mania anak-anak adalah kegiatan memancing yang dirancang khusus untuk anak-anak. 
                        Ada dua permainan mancing yang tersedia: memancing ikan lele dan memancing ikan mainan.</p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>15 menit</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>Kursi, ember, alat pancing</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 10.000</p>
                </div>
            </div>
            <div class="game">
                <img src="../../asset/img/odong-odong.jpg" alt="ODONG-ODONG">
                <div class="game-info">
                    <h3>ODONG-ODONG</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Odong-odong adalah sebuah permainan atau wahana hiburan anak-anak. Odong-odong berbentuk seperti 
                        kendaraan kecil yang dihiasi dengan berbagai bentuk, warna yang cerah dan lampu-lampu yang berwarna-warni.</p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>15 menit</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>Lagu anak-anak</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 20.000</p>
                </div>
            </div>
            <div class="game">
                <img src="../../asset/img/kereta_panggung.jpg" alt="KERETA PANGGUNG">
                <div class="game-info">
                    <h3>KERETA PANGGUNG</h3>
                    <p><strong>Deskripsi: </strong></p>
                    <p> Permainan ini terdiri dari mobil kecil yang berjalan di atas lintasan melingkar. Anak-anak dapat naik 
                        mobil tersebut dan menikmati sensasi berputar-putar dalam kecepatan yang aman dan menyenangkan.</p>
                    <p><strong>Waktu Permainan: </strong></p>
                    <p>10 menit</p>
                    <p><strong>Jam Operasional: </strong></p>
                    <p>16.30 - 22.00 WIB</p>
                    <p><strong>Fasilitas: </strong></p>
                    <p>-</p>
                    <p><strong>Harga: </strong></p>
                    <p>Rp. 5.000</p>
                </div>
            </div>
        </main>


        <div class="sticky-whatsapp">
            <a href="https://wa.me/+6287853053661" target="_blank">
                <img src="../../asset/img/logo_WA.png" alt="WhatsApp" class="whatsapp-logo">
            </a>
        </div>

        <div class="container">
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

        <div class="footer" id="footer">
            <p>&copy; Copyright 2023 | Created By Kelompok_5</p>
        </div>
    </body>
</html>

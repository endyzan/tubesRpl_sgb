<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permainan Stadion Gelora Bangkalan</title>
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
            color: black;
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

        /* ---------------------------------Content Start--------------------------------- */
        .judul_SGBGame {
            display: flex;
            background-color: black;
            height: 100px;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            width: 400px;
            margin: 200px 480px 30px 480px;
        }
        .judul_SGBGame p {
            font-size: 1.3rem;
            text-align: center;
            color: white;
            font-weight: bold;
        }
        .SGBGame_cart {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            background-color: #d3d3d3;
            margin: 0 90px 70px 90px;
            padding: 30px;
            border-radius: 20px;
        }

        .wraper_Foto1 {
            grid-column: 1 / 2;
        }

        .wraper_Foto2_3 {
            grid-column: 2 / 3;
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 10px;
        }

        .Foto1, .Foto2, .Foto3 {
            position: relative;
        }
        .Foto1 img {
            width: 100%;
            border-radius: 20px;
            display: block; 
        }

        .Foto2 img, .Foto3 img {
            width: 98%;
            border-radius: 20px;
            display: block;
        }

        .button_booking, .button_view {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.5);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 0.8rem;
            font-weight: bold;
            width: max-content;
        }

        .button_booking p, .button_view p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .SGBGame_cart {
                grid-template-columns: 1fr;
            }

            .wraper_Foto2_3 {
                grid-template-rows: none;
                grid-template-columns: 1fr 1fr;
                gap: 0px;
            }
        }

        .judul_PopularRides {
            display: flex;
            background-color: black;
            height: 80px;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            width: 300px;
            margin: 150px 550px 30px 550px;
        }
        .judul_PopularRides p {
            font-size: 1.3rem;
            text-align: center;
            color: white;
            font-weight: bold;
        }
        .PopularRides_cart {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0 auto;
            background-color: #d3d3d3;
            margin: 0 90px 70px 90px;
            padding: 30px;
            border-radius: 20px;
            gap: 15px;
        }
        .Foto_PR {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
        }
        .Foto_PR img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .Game_Mobil p, .Game_Melukis p {
            font-size: 1.0rem;
            font-weight: bold;
            text-align: center;
        }

        .judul_OurFacilities {
            display: flex;
            flex-direction: column;
            background-color: black;
            height: 100px;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            width: 600px;
            margin: 150px 380px 50px 380px;
        }

        .judul_OurFacilities p {
            font-size: 1.5rem; 
            text-align: center;
            color: white;
        }

        .judul_OurFacilities p span {
            color: white;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .icon_fasilitas {
            display: flex;
            justify-content: space-around;
            width: 60%;
            margin: 0 auto;
        }
        .icon {
            text-align: center;
            font-size: 4rem;
        }
        .icon i{
            color:#333333;
        }
        .icon p {
            margin-top: 15px;
            font-size: 1rem;
            font-weight: bold;
        }

        .judul_ContactUs {
            display: flex;
            background-color: black;
            height: 80px;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            width: 300px;
            margin: 150px 550px 30px 550px;
        }
        .judul_ContactUs p {
            font-size: 1.3rem;
            text-align: center;
            color: white;
            font-weight: bold;
        }

        .contactus {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin: 0 auto;
        max-width: 1200px;
        }

        .maps {
        width: 50%;
        height: 100%;
        float: left;
        height: 400px;
        margin-bottom: 20px;
        }

        .maps iframe {
        width: 100%;
        height: 100%;
        border: none;
        }

        .wrapper_CU {
        width: 50%;
        float: right;
        padding: 20px;
        border-radius: 5px;
        }

        .definitionSGB {
        text-align: justify;
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
        background-color: #d3d3d3;
        float: right;
        width: 50%;
        }

        .about {
        font-size: 14px;
        line-height: 1.5;
        background-color: #d3d3d3;
        float: right;
        }

        .about p {
        margin-bottom: 10px;
        }

        .about strong {
        font-weight: bold;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
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
        main h2 {
            text-align: center;
            margin-bottom: 2rem;
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
            width: 300px;
            height: 300px;
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
        footer {
            background-color: #4c4c4c;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
        footer .social-media {
            margin-top: 1rem;
        }
        footer .social-media a {
            color: white;
            margin: 0 0.5rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
        <!-- Header Start -->
        <div class="header">
        <div class="logo">
            <img src="foto/logo_SGB.jpg" alt="LOGO SGB">
        </div>

        <!-- Menu Start -->
        <div class="menu">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="permainan.php">PERMAINAN</a></li>
                <li><a href="#.php">EVENT</a></li>
                <li>
                    <a href="#.php">PROFIL</a>
                    <ul>
                        <li><a href="profil_kami.php">PROFIL KAMI</a></li>
                        <li><a href="#.php">GALERI</a></li>
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
    <div class="judul">
        <h1>ZONA PERMAINAN STADION GELORA BANGKALAN</h1>
    </div>
    <main>
        <div class="game">
            <img src="foto/mobil_listrik.jpg" alt="MOBIL LISTRIK">
            <div class="game-info">
                <h3>MOBIL LISTRIK</h3>
                <p>Permainan mobil listrik anak-anak adalah jenis mainan yang memungkinkan anak-anak merasakan pengalaman mengendarai mobil mini yang mirip dengan kendaraan sesungguhnya. Mobil listrik ini umumnya dirancang untuk anak-anak berusia antara 3 hingga 8 tahun.</p>
                <p><strong>Waktu Permainan: </strong>15 Menit</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>-</p>
                <p><strong>Harga: </strong>Rp. 15.000</p>
            </div>
        </div>
        <div class="game">
            <img src="foto/lukis.jpg" alt="MELUKIS ANAK-ANAK">
            <div class="game-info">
                <h3>MELUKIS ANAK-ANAK</h3>
                <p>Permainan melukis anak-anak adalah kegiatan kreatif yang melibatkan anak-anak dalam melukis untuk mengembangkan keterampilan seni.</p>
                <p><strong>Waktu Permainan: </strong>Sampai lukisan selesai</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>Kursi, cat air, alat lukis (kuas), papan lukis</p>
                <p><strong>Harga: </strong>Rp. 10.000/gambar</p>
            </div>
        </div>
        <div class="game">
            <img src="foto/istana_boneka.jpg" alt="ISTANA BONEKA">
            <div class="game-info">
                <h3>ISTANA BONEKA</h3>
                <p>Balon istana boneka anak-anak adalah mainan besar yang berbentuk istana, yang dirancang untuk memberikan ruang bermain yang aman dan menyenangkan bagi anak-anak.</p>
                <p><strong>Waktu Permainan: </strong>Sepuasnya</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>Playground, mandi bola</p>
                <p><strong>Harga: </strong>Rp. 10.000</p>
            </div>
        </div>
        <div class="game">
            <img src="foto/mancing.jpg" alt="MANCING MANIA">
            <div class="game-info">
                <h3>MANCING MANIA</h3>
                <p>Mancing mania anak-anak adalah kegiatan memancing yang dirancang khusus untuk anak-anak. Ada dua permainan mancing yang tersedia: memancing ikan lele dan memancing ikan mainan.</p>
                <p><strong>Waktu Permainan: </strong>15 menit</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>Kursi, ember, alat pancing</p>
                <p><strong>Harga: </strong>Rp. 10.000</p>
            </div>
        </div>
        <div class="game">
            <img src="foto/odong-odong.jpg" alt="ODONG-ODONG">
            <div class="game-info">
                <h3>ODONG-ODONG</h3>
                <p>Odong-odong adalah sebuah permainan atau wahana hiburan anak-anak. Odong-odong berbentuk seperti kendaraan kecil yang dihiasi dengan berbagai bentuk, warna yang cerah dan lampu-lampu yang berwarna-warni.</p>
                <p><strong>Waktu Permainan: </strong>15 menit</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>Lagu anak-anak</p>
                <p><strong>Harga: </strong>Rp. 20.000</p>
            </div>
        </div>
        <div class="game">
            <img src="foto/kereta_panggung.jpg" alt="KERETA PANGGUNG">
            <div class="game-info">
                <h3>KERETA PANGGUNG</h3>
                <p>Permainan ini terdiri dari mobil kecil yang berjalan di atas lintasan melingkar. Anak-anak dapat naik mobil tersebut dan menikmati sensasi berputar-putar dalam kecepatan yang aman dan menyenangkan.</p>
                <p><strong>Waktu Permainan: </strong>10 menit</p>
                <p><strong>Jam Operasional: </strong>16.30 - 22.00 WIB</p>
                <p><strong>Fasilitas: </strong>-</p>
                <p><strong>Harga: </strong>Rp. 5.000</p>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; copyright 2024 | Created by Kelompok_5</p>
        <!-- <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">YouTube</a> -->
        </div>
    </footer>
</body>
</html>

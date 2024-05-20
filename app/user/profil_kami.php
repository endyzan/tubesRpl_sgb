<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="PROFIL SGB">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>PROFIL KAMI</title>
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

            .profile-section {
                text-align: center;
                margin: 2rem auto;
                max-width: 800px;
                margin-top:160px;
                
            }

            .profile-section h2 {
                font-size: 24px;
                background-color: #000;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin: 2rem auto;
                max-width: 200px;
                border-radius: 40px;
                font-size: 15px;
                    
            }

            .profile-content {
                display: flex;
                justify-content: space-between;
                gap: 20px;
            }

            .profile-box {
                background-color: #e0e0e0;
                border-radius: 10px;
                padding: 1.5rem;
                flex: 1;
            }

            .profile-box h3 {
                font-size: 18px;
                margin-bottom: 1rem;
                color: blue;
                text-align: left;
            }

            .profile-box p {
                font-size: 14px;
                color: black;
                line-height: 1.5;
                text-align: left;
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
        
        <section class="profile-section">
            <h2>PROFIL KAMI</h2>
            <div class="profile-content">
                <div class="profile-box">
                    <h3>SGB : PERMAINAN MALAM UNTUK ANAK</h3>
                    <p>Keunikan yang mencolok dari Staidon Gelora Bangkalan adalah bangunannya yang berwarna-warni. Dari kejauhan warnanya sangat menarik perhatian, dan memberikan kesan meriah. Penegcatan pada bangunan ini memang ditujukan untuk menjadi ciri khas Stadion Gelora Bangkalan, serta menjadi daya tarik agar masyarakat mau mengunjungi. Memasuki area dalam stadion, pengunjung juga dapat melihat rumput stadion yang secara visual bagus dan rapi.</p>
                </div>
                <div class="profile-box">
                    <h3>ADA APA DI SGB ?</h3>
                    <p>Stadion ini resmi dibuka untuk umum sejak 18 November 2012 yang berlokasi di Jalan Soekarno-Hatta, Mlajah, Kecamatan Bangkalan, Kabupaten Bangkalan. Stadion ini dibuka untuk umum, jadi siapa saja dapat mengunjungi stadion ini meskipun sedang tidak ada pertandingan. Stadion ini menjadi salah satu yang terbesar di Madura. Maka tak heran, warga Madura menjadikannya sebagai kebanggaan. Warga Madura biasanya juga berkunjung ke stadion ini meskipun tidak ada pertandingan, hanya sekedar mengunjungi dan mengambil gambar.</p>
                </div>
            </div>
        </section>
        
        <div class="sticky-whatsapp">
            <a href="https://wa.me/+62 878-5305-3661" target="_blank">
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

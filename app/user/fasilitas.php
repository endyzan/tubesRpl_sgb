<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="FASILITAS SGB">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>FASILITAS</title>
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

            main {
                padding: 20px;
            }

            .section-title {
                font-size: 35px;
                margin-bottom: 20px;
                background-color: #000;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin: 2rem auto;
                max-width: 800px;
                border-radius: 40px;
                margin-top:170px;
            }

            .facility {
                display: flex;
                background-color: #f1f1f1;
                margin-bottom: 20px;
                border-radius: 10px;
                overflow: hidden;
            }

            .facility img {
                width: 700px;
                margin-left:20px;
                margin-bottom:20px;
                margin-top:20px;
                border-radius:20px;
                object-fit: cover;
            }

            .facility-info {
                padding: 20px;
                width: 60%;
            }

            .facility h3 {
                color: black;
                margin-bottom : 20px;
                font-size: 1.5rem;
            }

            .facility p {
                color: black;
                margin-bottom : 20px;
                font-size: 1.2rem;
            }

            footer {
                background-color: #f1f1f1;
                padding: 20px 0;
                text-align: center;
            }

            .footer-container {
                display: flex;
                justify-content: space-around;
            }

            .footer-container h3 {
                margin-bottom: 10px;
            }

            .footer-container ul {
                list-style: none;
                padding: 0;
            }

            .footer-container ul li {
                margin-bottom: 5px;
            }

            .footer-container ul li a {
                text-decoration: none;
                color: #4B0082;
            }

            .follow-us ul {
                display: flex;
                justify-content: center;
            }

            .follow-us ul li {
                margin: 0 10px;
            }

            .follow-us ul li a img {
                width: 24px;
                height: 24px;
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
        
        <main>
            <h2 class="section-title">FASILITAS STADION GELORA BANGKALAN</h2>
            
            <div class="facility">
                <img src="../../asset/img/pumara.jpg" alt="PUMARA">
                <div class="facility-info">
                    <h3>PUMARA</h3>
                    <p>PUMARA adalah Pusat Makanan Rakyat yang buka dari sore hingga malam hari dan ramainya Pumara ini biasa terjadi pada malam hari ketika sebagian besar orang-orang lepas dari rutinitas sehari-hari dan mencari makanan di luar rumah.</p>
                    <p>Makanan yang dijajakan adalah Khas Pedagang kaki lima seperti Nasi Goreng, Mie Goreng, Sea Food, Sate Madura, Soto, Tempe Penyet, dan lain sebagainya juga minuman yang tersedia yakni Teh, Jeruk, Kopi dan lainnya yang bisa dipilih sesuai dengan keinginan TreTan.</p>
                </div>
            </div>
            
            <div class="facility">
                <img src="../../asset/img/jajanan.jpg" alt="Jajanan UMKM">
                <div class="facility-info">
                    <h3>JAJANAN UMKM</h3>
                    <p>Jajanan UMKM di Stadion Gelora Bangkalan menawarkan berbagai pilihan makanan dan minuman lokal yang lezat dan beragam. Para pedagang UMKM menyediakan camilan seperti tahu tek, rujak cingur, bakso, pentol, telur gulung, waffle, cilok, dll. Ada juga pilihan minuman segar seperti es dawet, es campur, es degan, dll. Selain itu, tersedia makanan berat seperti nasi goreng, sate, mie ayam, rawon, bubur ayam, dll. Para pengunjung dapat menikmati cita rasa khas Madura dan menikmati suasana stadion dengan jajanan yang disajikan oleh para pelaku UMKM.</p>
                </div>
            </div>
            
            <div class="facility">
                <img src="../../asset/img/mushola.jpg" alt="Mushola">
                <div class="facility-info">
                    <h3>MUSHOLA</h3>
                    <p>Musholla Stadion Gelora Bangkalan ini berada di Pumara. Musholla ini menyediakan fasilitas ibadah bagi pengunjung dan atlet. Terdapat area wudhu, lengkap dengan fasilitas air bersih. Musholla ini memberikan kemudahan bagi para pengunjung yang ingin menunaikan ibadah di stadion.</p>
                </div>
            </div>
        </main>

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

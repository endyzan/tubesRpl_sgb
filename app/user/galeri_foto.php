<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="GALERI SGB">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>GALERI</title>
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

            /* ---------------------------------Content Start--------------------------------- */
            .judul_galeri {
                display: flex;
                background-color: black;
                height: 80px;
                align-items: center;
                justify-content: center;
                border-radius: 20px;
                width: 500px;
                margin: 180px 40px 30px 450px;
            }
            .judul_galeri p {
                font-size: 1.3rem;
                text-align: center;
                color: white;
                font-weight: bold;
            }
            
            .gallery-cart {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                justify-content: center;
                margin: 30px 60px 30px 60px;
            }

            .img-container {
                position: relative;
                width: 100%;
                padding-top: 75%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }

            .img-container img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 20px;
                transition: 0.2s linear;
            }

            .img-container:hover img {
                transform: scale(1.1);
                filter: brightness(120%);
            }

            .popup-img {
                position: fixed;
                top: 0;
                left: 0;
                background: rgb(0, 0, 0, 0.9);
                height: 100%;
                width: 100%;
                z-index: 999;
                display: none;
            }
            .popup-img span {
                position: absolute;
                top: 0;
                right: 10px;
                font-size: 50px;
                font-weight: bolder;
                color: #fffbfb;
                cursor: pointer;
            }
            .popup-img img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border: 5px solid#fffbfb;
                border-radius: 5px;
                width: 750px;
                object-fit: cover;
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

            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
                gap: 20px; /* Space between links */
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

        <!-- Main Start -->
        <div class="main">
            <div class="content">
                <div class="judul_galeri" id="galeri">
                    <p>GALERI FOTO STADION GELORA BANGKALAN</p>
                </div>
                <div class="gallery-cart">
                    <div class="img-container">
                        <img src="../../asset/img/SGBGame_3.jpg" alt="gallery1">
                    </div>
                    <div class="img-container">
                        <img src="../../asset/img/odong-odong.jpg" alt="gallery2">
                    </div>
                    <div class="img-container">
                        <img src="../../asset/img/SGB_syarat.jpg" alt="gallery3">
                    </div>
                    <div class="img-container">
                        <img src="../../asset/img/night_view.jpg" alt="gallery4">
                    </div>
                    <div class="img-container">
                        <img src="../../asset/img/Rectangle 77.png" alt="gallery5">
                    </div>
                    <div class="img-container">
                        <img src="../../asset/img/Rectangle 78.png" alt="gallery6">
                    </div>
                </div>
                <div class="popup-img">
                    <span>&times;</span>
                    <img src="../../asset/img/SGBGame_3.jpg" alt="gallery7">
                </div>

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
            </div>
        </div>

        <!-- Script -->
        <script src="../../asset/script/script.js"></script>
    </body>
</html>
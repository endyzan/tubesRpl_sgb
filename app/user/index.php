<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="HOME SGB">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>HOME</title>
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

            .pembuka img {
                width: 100%;
                margin-top: 170px;
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
                margin: 100px 480px 30px 480px;
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
                margin: 0px 90px 70px 90px;
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

            .button_booking a, .button_view a {
                margin: 0;
                color: white;
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
            .icon_fasilitas a {
                color: black;
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
                flex-wrap: wrap;
                padding: 20px;
            }

            .maps {
                flex: 1 1 320px;
                margin-left: 90px;
                padding: 0;
            }

            .wrapper_CU {
                display: flex;
                flex-direction: column;
                flex: 1 1 300px;
                margin: 0;
                padding: 0;
                gap: 30px;
            }

            .wrapper_definitionSGB,
            .wrapper_about {
                background-color: #f0f0f0;
                padding: 10px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-right: 90px;
            }

            .definitionSGB p {
                font-weight: bold;
            }

            .definitionSGB p,
            .about p {
                margin: 5px 0;
                font-size: 1.1rem;
            }

            .about strong {
                display: block;
                margin-bottom: 5px;
            }

            @media (max-width: 768px) {
                .contactus {
                    flex-direction: column;
                }

                .maps iframe {
                    width: 100%;
                    height: auto;
                }
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

        <!-- Hero Section Start -->
        <div class="hero">
            <div class="pembuka">
                <img src="../../asset/img/home.jpg" alt="SGB">
            </div>
        </div>
        <!-- Hero Section End -->

        <!-- Main Start -->
        <div class="main">
            <div class="content">
                <div class="judul_SGBGame" id="SGBGame">
                    <p>STADION GELORA BANGKALAN PERMAINAN ANAK - ANAK</p>
                </div>
                <div class="SGBGame_cart">
                    <div class="wraper_Foto1">
                        <div class="Foto1">
                            <img src="../../asset/img/SGBGame_1.jpg" alt="Foto1">
                        </div>
                    </div>
                    <div class="wraper_Foto2_3">
                        <div class="Foto2">
                            <img src="../../asset/img/SGBGame_2.jpg" alt="Foto2">
                            <div class="button_booking">
                                <a href="formulirbooking.php">BELI TIKET SEKARANG</a>
                            </div>
                        </div>
                        <div class="Foto3">
                            <img src="../../asset/img/SGBGame_3.jpg" alt="Foto3">
                            <div class="button_view">
                                <a href="maps.php">LIHAT PETA</a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="judul_PopularRides" id="PopularRides">
                    <p>POPULAR RIDES</p>
                </div>
                <div class="PopularRides_cart">
                    <div class="Foto_PR">
                        <img src="../../asset/img/MobilListrik.jpg" alt="Foto1">
                        <div class="Game_Mobil">
                            <p>MOBIL LISTRIK</p>
                        </div>
                    </div>
                    <div class="Foto_PR">
                        <img src="../../asset/img/Melukis.jpg" alt="Foto2">
                        <div class="Game_Melukis">
                            <p>MELUKIS ANAK - ANAK</p>
                        </div>
                    </div>
                </div>

                <div class="judul_OurFacilities" id="OurFacilities">
                    <p><span>OUR FACILITIES </span><p>
                    <p> THE BEST FACILITIES FOR THE BEST EXPERIENCE </p>
                </div>
                <div class="icon_fasilitas">
                    <a href="fasilitas.php#pumara">
                        <div class="icon">
                            <i class="fas fa-utensils"></i>
                            <p>PUMARA</p>
                        </div>
                    </a>
                    <a href="fasilitas.php#jajanan_umkm">
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                            <p>JAJANAN UMKM</p>
                        </div>
                    </a>
                    <a href="fasilitas.php#mushola">
                        <div class="icon">
                            <i class="fas fa-mosque"></i>
                            <p>MUSHOLA</p>
                        </div>
                    </a>
                </div>

                <div class="judul_ContactUs" id="ContactUs">
                    <p>CONTACT US</p>
                </div>
                <div class="contactus">
                    <div class="maps">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.709823469216!2d112.73696947499775!3d-7.0433471929587705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd80593443d908d%3A0x46c0cd4bbd83ae07!2sStadion%20Gelora%20Bangkalan!5e0!3m2!1sen!2sid!4v1715708968306!5m2!1sen!2sid"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                    <div class="wrapper_CU">
                        <div class="wrapper_definitionSGB">
                            <div class="definitionSGB">
                                <p> Stadion Gelora Bangkalan dibangun pada tahun 2012 terletak di Jalan Soekarno-Hatta. 
                                    Stadion ini beroperasi pada sore hingga malam hari. 
                                    Stadion ini menggabungkan konsep pusat makanan rakyat dan permainan hiburan di dalamnya.</p>
                            </div>
                        </div>
                        <div class="wrapper_about">
                            <div class="about">
                                <p><strong>Alamat:</strong></p>
                                <p>Jl. Soekarno Hatta, Wr 08, Mlajah, Bangkalan Kabupaten Bangkalan, Jawa Timur 69116 Indonesia</p>
                                <p><strong>Telephone:</strong></p>
                                <p>-</p>
                                <p><strong>Jam Buka:</strong></p>
                                <p>16.30 - 22.00 WIB</p>
                                <p><strong>Jenis Objek Wisata:</strong></p>
                                <p>Wisata anak - anak</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sticky-whatsapp">
                    <a href="https://wa.me/+6287853053661" target="_blank">
                        <img src="../../asset/img/logo_WA.png" alt="WhatsApp" class="whatsapp-logo">
                    </a>
                </div>

                <div class="footer" id="footer">
                    <p>&copy; Copyright 2023 | Created By Kelompok_5</p>
                </div>
            </div>
        </div>
    </body>
</html>

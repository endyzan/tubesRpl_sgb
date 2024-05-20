<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="T&C SGB">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>SYARAT DAN KETENTUAN</title>
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

            .main-image img {
                width: 100%;
                margin-top: 150px;
            }

            .terms, .payment-methods {
                margin-bottom: 40px;
                padding: 50px;
            }

            .terms h2, .payment-methods h2 {
                background-color: #000;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin: 2rem auto;
                max-width: 400px;
                border-radius: 40px;
                font-size: 1.5rem;

            }
            .terms h3, .payment-methods h3 {
                color: black;
                font-size: 1.5rem;
            }

            .terms p {
                color: black;
                font-size: 1.2rem;
            }

            .terms ol li strong {
                color: black;
                font-size: 1.2rem;
            }

            .terms ol li {
                color: black;
                font-size: 1.2rem;
            }

            .terms ol li {
                color: black;
                font-size: 1.2rem;
            }

            .payment-methods ol li {
                color: black;
                font-size: 1.2rem;
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
            <div class="main-image">
                <img src="../../asset/img/SGB_syarat.jpg" alt="Stadion Gelora Bangkalan">
            </div>
            
            <section class="terms">
                <h2>Syarat dan Ketentuan</h2>
                <p>Berikut adalah syarat dan ketentuan untuk pembelian dan penggunaan tiket Stadion Gelora Bangkalan:</p>
                <ol>
                    <li>
                        <strong>Pemesanan Tiket:</strong> Tiket harus dipesan paling lambat satu hari (H-1) sebelum tanggal kunjungan yang telah Anda pilih. Mohon pastikan Anda memesan tiket Anda tepat waktu.
                    </li>
                    <li>
                        <strong>Masa Berlaku Tiket:</strong> Tiket berlaku hanya pada tanggal kunjungan yang telah Anda pilih saat pembelian. Tidak ada pengecualian.
                    </li>
                    <li>
                        <strong>Penggunaan Hari:</strong> Tiket berlaku baik pada weekday maupun weekend. Anda dapat mengunjungi stadion kapan saja selama jadwal operasional pada tanggal yang telah ditentukan.
                    </li>
                    <li>
                        <strong>Kebijakan Pembelian:</strong> Setelah tiket dibeli, tiket bersifat tetap dan hanya dapat digunakan dalam jangka waktu yang ditetapkan. Tidak ada opsi untuk memperpanjang masa berlaku tiket.
                    </li>
                    <li>
                        <strong>Pembatasan Penggunaan:</strong> Tiket hanya berlaku untuk satu kali kunjungan. Setelah digunakan, tiket tidak dapat digunakan kembali.
                    </li>
                    <li>
                        <strong>Kebijakan Pembatalan dan Pengembalian:</strong> Semua pembelian tiket bersifat final. Tidak ada opsi pembatalan atau pengembalian dana setelah pembelian tiket dilakukan.
                    </li>
                    <li>
                        <strong>Perubahan Jadwal:</strong> Tiket tidak dapat dijadwalkan ulang atau diubah setelah pembelian. Harap pastikan tanggal kunjungan yang Anda pilih sudah sesuai dengan rencana Anda.
                    </li>
                </ol>
                <p>Dengan membeli tiket, Anda setuju untuk mematuhi semua syarat dan ketentuan yang tercantum di atas. Terima kasih atas kerjasama Anda dan selamat menikmati kunjungan Anda ke Stadion Gelora Bangkalan!</p>
            </section>
            
            <section class="payment-methods">
                <h3>Metode Pembayaran</h3>
                <ol>
                    <li>Pembayaran dilakukan dengan transfer melalui ATM dan Internet Banking. ATM yang bisa digunakan untuk pembayaran yaitu BTN, BSI, BCA.</li>
                    <li>Untuk pembayaran, pelanggan diharuskan untuk klik submit untuk proses pembayaran secara online dan memasukkan bukti pembayaran.</li>
                    <li>Stadion Gelora Bangkalan tidak bertanggung jawab atas adanya penyalahgunaan alat pembayaran dalam bentuk apapun yang merupakan hak milik pelanggan.</li>
                </ol>
            </section>
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

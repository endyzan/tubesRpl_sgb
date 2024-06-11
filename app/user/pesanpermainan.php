<?php
   session_start();     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket Permainan</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
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

        .footer2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 80px;
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

    <div class = "isi">
        <div class="curved-box-title">PEMESANAN TIKET PERMAINAN</div>
        
        <?php
        
        try {
            require_once "../base.php";

            // Fetch booking details
            $kodebooking = $_SESSION['kodebooking']; // Ganti dengan kodebooking yang sesuai
            $kodebookingbaru = $_SESSION['kodebooking']."A"; // Ganti dengan kodebooking yang sesuai
            $query = $db->prepare("SELECT kode_booking, tanggal FROM pemesanan_ticketH WHERE kode_booking = :kodebooking");
            $query->bindParam(':kodebooking', $kodebooking);
            $query->execute();
            $bookingDetails = $query->fetch(PDO::FETCH_ASSOC);

            if ($bookingDetails) {
                echo "<div class='booking-info'>
                        <p>Kode Booking: {$kodebookingbaru}</p>
                        <p>Tanggal Kunjungan: {$bookingDetails['tanggal']}</p>
                    </div>";
            } else {
                echo "<p>Kode booking tidak ditemukan.</p>";
            }
        } catch (PDOException $e) {
            echo "Connecting Failed: " . $e->getMessage();
        }
        ?>

        <form id="booking-form" action="proses_permainan.php" method="POST">
            <input type="hidden" name="kodebookinglama" value="<?php echo $kodebooking; ?>">    
            <input type="hidden" name="kodebooking" value="<?php echo $kodebookingbaru; ?>">
            <input type="hidden" name="tanggal_kunjungan" value="<?php echo $bookingDetails['tanggal']; ?>">

            <div class='sekat'></div>
            <div class="container">
                <div class="curved-box">Langkah 3 :</div>  
                <div class="orangetext">Ticket Permainan:</div>
            </div>

            <?php
            $daftarpermainan = $db->prepare("SELECT * from permainan");
            $daftarpermainan->execute();
            $daftarpermainan = $daftarpermainan->fetchAll(PDO::FETCH_ASSOC);
            $c = 0;

            foreach ($daftarpermainan as $permainan) {
                echo "<button type='button' class='tombol-permainan' data-id='{$permainan['id_permainan']}' data-harga='{$permainan['harga']}' data-durasi='{$permainan['durasi']}'>{$permainan['nama_permainan']}</button>";
                if ($c == 2){
                    echo "<br>";
                }
                $c += 1;
            }

            ?>
            
            <div id="detail-permainan"></div>

            <div class="text-box-white">
                <div class="text-item-white">Total: </div>
                <div class="text-item-white"><span id="total-keseluruhan">0</span></div>
            </div>
            <div class='sekat'></div>

            <div class="btn-submit-container">
                <div class="btn-submit"><input type="submit" id="pesan" name="pesan" value="PESAN"></div>
            </div>
        </form>

        <script>
            let totalKeseluruhan = 0;
            let permainanDiklik = false;

            document.querySelectorAll('.tombol-permainan').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const id = item.getAttribute('data-id');
                    const harga = parseInt(item.getAttribute('data-harga'));
                    const durasi = item.getAttribute('data-durasi');
                    const jenis = item.textContent;

                    if (!permainanDiklik) {
                        const headerDiv = document.createElement('div');
                        headerDiv.innerHTML = `
                            <div class="text-box-white">
                                <div class="text-item-white">PERMAINAN</div>
                                <div class="text-item-white">HARGA</div>
                                <div class="text-item-white">MENIT</div>
                                <div class="text-item-white">JUMLAH</div>
                                <div class="text-item-white">SUB TOTAL</div>
                                <div class="text-item-white"></div>
                            </div>
                        `;
                        document.getElementById('detail-permainan').appendChild(headerDiv);
                        permainanDiklik = true;
                    }

                    if (!document.getElementById(`permainan-${id}`)) {
                        const div = document.createElement('div');
                        div.id = `permainan-${id}`;
                        div.innerHTML = `
                            <div class="text-box">
                                <div class="text-item">${jenis}</div>
                                <div class="text-item">${harga}</div>
                                <div class="text-item">${durasi} menit</div>
                                <button type="button" class="btn-minus-permainan" data-id="${id}" data-harga="${harga}">-</button>
                                <div class="text-item"><input type="number" name="${id}" id="${id}" value="1" min="1" readonly></div>
                                <button type="button" class="btn-plus-permainan" data-id="${id}" data-harga="${harga}">+</button>
                                <div class="text-item"><span id="subtotal_${id}">${harga}</span></div>
                                <div class="text-item"><button type="button" class="hapus-permainan" data-id="${id}">Hapus</button></div>
                            </div>
                        `;
                        document.getElementById('detail-permainan').appendChild(div);

                        totalKeseluruhan += harga;
                        document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');

                        document.querySelector(`#permainan-${id} .btn-plus-permainan`).addEventListener('click', (event) => {
                            event.preventDefault();
                            let jumlah = parseInt(document.getElementById(id).value);
                            jumlah++;
                            document.getElementById(id).value = jumlah;
                            const subtotal = harga * jumlah;
                            document.getElementById(`subtotal_${id}`).textContent = subtotal;
                            totalKeseluruhan += harga;
                            document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                        });

                        document.querySelector(`#permainan-${id} .btn-minus-permainan`).addEventListener('click', (event) => {
                            event.preventDefault();
                            let jumlah = parseInt(document.getElementById(id).value);
                            if (jumlah > 1) {
                                jumlah--;
                                document.getElementById(id).value = jumlah;
                                const subtotal = harga * jumlah;
                                document.getElementById(`subtotal_${id}`).textContent = subtotal;
                                totalKeseluruhan -= harga;
                                document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                            }
                        });

                        document.querySelector(`#permainan-${id} .hapus-permainan`).addEventListener('click', (event) => {
                            event.preventDefault();
                            const subtotal = parseInt(document.getElementById(`subtotal_${id}`).textContent);
                            totalKeseluruhan -= subtotal;
                            document.getElementById('total-keseluruhan').textContent = totalKeseluruhan.toLocaleString('id-ID');
                            document.getElementById(`permainan-${id}`).remove();
                        });
                    }
                });
            });

            // Form validation to ensure at least one ticket is selected
            document.getElementById('booking-form').addEventListener('submit', function(event) {
                if (!document.querySelector('#detail-permainan > div')) {
                    event.preventDefault();
                    alert('Anda harus memesan setidaknya satu tiket permainan .');
                }
            });
        </script>
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

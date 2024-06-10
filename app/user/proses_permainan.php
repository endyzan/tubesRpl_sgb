<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    try{

        require_once "../base.php";

        $kodebooking = $_POST['kodebooking'];

        echo '<body>
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
            <div class="curved-box-title">TICKET BOOKING</div>';
            echo "
                    <div class='orangetext'> Kode Booking Anda :</div>
                    <div class='blacktext'> ".$kodebooking."</div>
                <br>
                <div class='sekat'></div>";
            
            echo "<div class='orangetext'> Tanggal Kunjungan Anda :</div> 
                    <div class='blacktext'> ".$_POST['tanggal_kunjungan']."</div><br><div class='sekat'></div>"; // Tampilkan tanggal kunjungan yang dipilih dari halaman formulirbooking.php
            echo "<div class='orangetext'>Tempat Pilihan Anda</div>
                    <div class='curved-box'> Wisata Malam Stadion Glora Bangkalan</div><br><div class='sekat'></div>";
            // var_dump ($_POST['kodebookinglama']);
            $hargaticketmasuk = $db->prepare("SELECT * from ticket_masuk");
            $hargaticketmasuk->execute();
            $hargaticketmasuk = $hargaticketmasuk->fetchAll(PDO::FETCH_ASSOC);
            $ticketmasukkodebookinglama = $db->prepare("SELECT * from pemesanan_ticketH where kode_booking = '{$_POST['kodebookinglama']}'");
            $ticketmasukkodebookinglama->execute();
            $ticketmasukkodebookinglama = $ticketmasukkodebookinglama->fetchAll(PDO::FETCH_ASSOC);
            
            $totalpembelian = 0;
            
            $daftarpermainan = $db->prepare("SELECT * from permainan");
            $daftarpermainan->execute();
            $daftarpermainan = $daftarpermainan->fetchAll(PDO::FETCH_ASSOC);

            $permainan = array();

            foreach ($daftarpermainan as $mainan){
                $permainan[$mainan["id_permainan"]] = array(
                    "nama_permainan"=>$mainan["nama_permainan"],
                    "durasi"=>$mainan["durasi"],
                    "harga"=>$mainan["harga"]
                );
            }
            $iter = 0;
            // var_dump($permainan);
            echo "<div class='grid-curved'>";
            foreach ($_POST as $key=>$val){
                if (array_key_exists($key,$permainan)){
                    echo '
                            <div class="curved-box-ongrid">'.$permainan[$key]["nama_permainan"]."</div>
                        ";
                }
            }
            echo "</div><div class='sekat'></div><div class='orangetext'>Jumlah Pembelian</div>";

            foreach ($_POST as $key=>$val){
                if (array_key_exists($key,$permainan)){
                    if ($iter == 0){
                        echo '
                        <div class="text-box-white">
                            <div class="text-item-white">PERMAINAN</div>
                            <div class="text-item-white">HARGA</div>
                            <div class="text-item-white">MENIT</div>
                            <div class="text-item-white">JUMLAH</div>
                            <div class="text-item-white">SUB TOTAL</div>
                        </div>';
                    }
                    $iter += 1;
                    echo '<div class="text-box">
                            <div class="text-item">'.$permainan[$key]["nama_permainan"]."</div>
                            <div class='text-item'>IDR ".$permainan[$key]["harga"]."</div>
                            <div class='text-item'>".$permainan[$key]["durasi"]."</div>
                            <div class='text-item'>".$val."</div>
                            <div class='text-item'>IDR ".$permainan[$key]["harga"]*$val."</div>
                        </div>";
                    $totalpembelian += $permainan[$key]["harga"]*$val;
                }
            }
            echo "<br><div class='text-box-white'>
                    <div class='text-item-white'></div>
                    <div class='text-item-white'>Total :</div>
                    <div class='text-item-white'></div>
                    <div class='text-item-white'></div>
                    <div class='text-item-white'>IDR ".$totalpembelian."</div>
                    </div>";
            echo "<br><br><div class='orangetext'>Data anda </div>"."<br>"; // Tampilkan Data diri yang di isi dari halaman formulirbooking.php 
            echo "<div class='grid-container'>";

            $datapembeli = $db->prepare("SELECT nama_pembeli as Nama , email_pembeli as Email , alamat as Alamat , kota as Kota from pembeli where id_pembeli = '{$ticketmasukkodebookinglama[0]['id_pembeli']}' ");
            $datapembeli->execute();
            $datapembeli = $datapembeli->fetchAll(PDO::FETCH_ASSOC);
            foreach($datapembeli[0] as $key => $data){
                echo "<div class='subgrid'>
                    <div class='grid-item'>".$key."</div>
                    <div class='grid-item'> : </div>
                    <div class='grid-item'>".$data."</div>
                </div><br>" ;
            }
            echo"</div>";

            $buatticket = $db->prepare("INSERT into pemesanan_ticketH values('{$kodebooking}','{$_POST['tanggal_kunjungan']}','{$ticketmasukkodebookinglama[0]['id_pembeli']}','Ticket_Masuk',0,{$totalpembelian},'01','0');");
            $buatticket->execute();

            $_SESSION['kodebooking'] = $kodebooking;

            foreach ($_POST as $key=>$val){

                if (array_key_exists($key,$permainan)){
                    $subharga = $permainan[$key]['harga']*$val;

                    $insertpermainan = $db->prepare("INSERT into pemesanan_ticketD value ('{$kodebooking}', '{$key}', {$val},{$subharga})");
                    $insertpermainan->execute();
                    // echo $key." ".$permainan[$key]["harga"]." ".$val." ".$permainan[$key]["harga"]*$val."<br>";
                }
            }                          
            $daftarbank = $db->prepare("SELECT * from bank");
            $daftarbank->execute();
            $daftarbank = $daftarbank->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($daftarbank);
            echo '<div class="curved-box-title">PEMBAYARAN</div>';


            echo "
            <div class='containerpembayaran'>
                <!-- Left box -->
                <div class='left-box'>
                    <div class='section'>
                        <h2>Pilih Metode Pembayaran</h2>
                        <div class='white-box'>
                            <p>Transfer Bank</p>
                        </div>
                        <div class='white-box'>";
            echo '<form method="POST" action="uploadbukti.php">'; // Tambahkan method dan action untuk form 
            foreach ($daftarbank as $bank) {
                $checked = ($bank["nama_bank"] == "BCA") ? "checked" : "";
                echo '<input type="radio" name="bank" value="'.$bank["id_bank"].'" '.$checked.' onclick="updateRekening('.$bank["no_rek"].')">'.$bank["nama_bank"].'<br>';
            }
            echo"
                        </div>
                        <div class='white-box'>";
                            echo '<br>Nomor Rekening: <span id="no_rek">'.$daftarbank[0]["no_rek"].'</span>';
            echo "      </div>
                        <div class='btn-submit-container'>
                            <input type='submit' name='pilih_bank' value='PILIH'>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Right box -->
                <div class='right-box'>
                    <div class='section'>
                        <h2>Ringkasan Transaksi</h2>
                        <p>Nomor Invoice</p>
                        <p class='red-text'>".$kodebooking."</p>
                        <p>Jumlah yang harus dibayarkan</p>
                        <p class='red-text'>".$totalpembelian."</p>
                        <p>Note : Screenshot Dan Simpan Nomor Invoice Anda
                    </div>
                </div>
        </div>
    </div>";

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

        echo '
        </body>';
    


    }
    catch(PDOException $err){
        echo "Connecting Failed" . $err->getMessage();
    }
?>
<script>
function updateRekening(noRek) {
    document.getElementById("no_rek").innerText = noRek;
}
</script>

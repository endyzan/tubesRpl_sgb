<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota Ticket</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
</head>
<body>
    <?php
    session_start();
    try {
        require_once "../base.php";

        // Query untuk mendapatkan data pembeli dan tiket
        $pembeliQuery = $db->prepare("SELECT p.nama_pembeli, p.kota, p.nohp_pembeli, p.email_pembeli FROM pembeli p,pemesanan_ticketH WHERE p.id_pembeli = pemesanan_ticketH.id_pembeli  and pemesanan_ticketH.kode_booking = '{$_SESSION['kodebooking']}'");
        $pembeliQuery->execute();
        $pembeli = $pembeliQuery->fetch(PDO::FETCH_ASSOC);
        $tiketQuery = $db->prepare("SELECT * FROM pemesanan_ticketH WHERE kode_booking = '{$_SESSION['kodebooking']}'");
        $tiketQuery->execute();
        $tiket = $tiketQuery->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $err) {
        echo "Connection Failed: " . $err->getMessage();
    }
    ?>

    <div class="nota-container">
        <div class="header-nota"><div class="judulheader">Stadion Gelora<br> Bangkalan</div></div>

        <div class="section-title"><div class="blacktext">Personal Information</div></div>
        <div class="content-nota">
            <p>Nama: <?php echo htmlspecialchars($pembeli['nama_pembeli']); ?></p>
            <p>Kota: <?php echo htmlspecialchars($pembeli['kota']); ?></p>
            <p>NoHp: <?php echo htmlspecialchars($pembeli['nohp_pembeli']); ?></p>
            <p>Email: <?php echo htmlspecialchars($pembeli['email_pembeli']); ?></p>
        </div>

        <div class="section-title"><div class="blacktext">Informasi Ticket Masuk</div></div>
        <div class="content-nota">
            <p>Kode Booking: <?php echo htmlspecialchars($tiket['kode_booking']); ?></p>
            <p>Tanggal: <?php echo htmlspecialchars($tiket['tanggal']); ?></p>
            <p>Jumlah: <?php echo htmlspecialchars($tiket['jumlah']); ?></p>
            <p>Status: <?php 
                if (htmlspecialchars($tiket['status']) == 1){
                    echo "Sudah Terbayar";
                }
                else{
                    echo "Belum Dibayar";
                }?></p>
        </div>
        <?php
            $cekpermainan = $db->prepare("SELECT EXISTS( SELECT * FROM pemesanan_ticketD WHERE kode_booking = '{$_SESSION['kodebooking']}')");
            $cekpermainan->execute();
            $cekpermainan= $cekpermainan->fetch(PDO::FETCH_COLUMN);

            if($cekpermainan==1){
                echo'<div class="section-title"><div class="blacktext">Informasi Ticket Permainan</div></div>';
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

                $permainanpembeli = $db->prepare("SELECT * from pemesanan_ticketD where kode_booking = '{$_SESSION['kodebooking']}'");
                $permainanpembeli->execute();
                $permainanpembeli = $permainanpembeli->fetchAll(PDO::FETCH_ASSOC);
                echo '<div class="content-nota">';

                for ($i=0;$i<count($permainanpembeli);$i++){

                foreach ($permainanpembeli[$i] as $key => $val){
                    // var_dump($key,$val);
                    // string(12) "kode_booking" string(17) "SGB2024060225074A" string(12) "id_permainan" string(9) "FISHING01" string(6) "jumlah" int(1) string(8) "subtotal" int(15000)

                    if (array_key_exists($val,$permainan)){
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
                        echo '<div class="text-box-white">
                                <div class="text-item-white">'.$permainan[$val]["nama_permainan"]."</div>
                                <div class='text-item-white'>IDR ".$permainan[$val]["harga"]."</div>
                                <div class='text-item-white'>".$permainan[$val]["durasi"]."</div>
                                <div class='text-item-white'>".$permainanpembeli[$i]['jumlah']."</div>
                                <div class='text-item-white'>IDR ".$permainan[$val]["harga"]*$permainanpembeli[$i]['jumlah']."</div>
                            </div>";
                        $totalpembelian += $permainan[$val]["harga"]*$permainanpembeli[$i]['jumlah'];
                    }
                    else{
                        // var_dump("MASUK FALSE");
                    }
                }}
                echo '</div>';
            }
        ?>
        <div class="terms">
            <p><b>Syarat dan Ketentuan:</b></p>
            <p>1. Termasuk tiket Stadion Gelora Bangkalan</p>
            <p>2. Tiket Berlaku sesuai tanggal kunjungan yang telah dipilih</p>
            <p>3. Tiket berlaku di semua hari, weekday dan weekend</p>
            <p>4. Tiket yang dibeli bersifat tetap.</p>
            <p>5. Tiket hanya dapat digunakan sampai batas waktu yang telah ditentukan</p>
            <p>6. Pengunjung tidak dapat memperpanjang masa berlaku tiket</p>
            <p>7. Tiket hanya berlaku untuk satu kali kunjungan</p>
            <p>8. Tiket tidak dapat dibatalkan atau refund</p>
            <p>9. Tiket tidak dapat di reschedule</p>
        </div>

        <div class="footer-nota">
            Stadion Gelora Bangkalan<br>
            Jl. Soekarno Hatta, Wr 08, Mlajah, Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116 Indonesia
        </div>
    </div>

    
        <form method="post" action="downloadnota.php">
            <div class='btn-submit-container'><button type="submit" name="download_pdf">Download PDF</button></div>
        </form>
</body>
</html>

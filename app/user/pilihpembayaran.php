<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    try{

        require_once "../base.php";

        $kodebooking = "SGB" . date('Ymd') . rand(0,100000);
        $cekkodebooking = $db->prepare("SELECT kode_booking from pemesanan_ticketH where kode_booking = '{$kodebooking}'");
        $cekkodebooking->execute();

        while ($cekkodebooking->rowCount() > 0){
            echo "masuk while";
            $kodebooking = "SGB" . date('Ymd') . rand(0,100000);
            $cekkodebooking = $db->prepare("SELECT kode_booking from pemesanan_ticketH where kode_booking = '{$kodebooking}'");
            $cekkodebooking->execute();
        }

        echo '<body>
        <div class="curved-box-title">TICKET BOOKING</div>';
        echo "
                <div class='orangetext'> Kode Booking Anda :</div>
                <div class='blacktext'> ".$kodebooking."</div>
            <br>
            <div class='sekat'></div>";
        
        echo "<div class='orangetext'> Tanggal Kunjungan Anda :</div> 
                <div class='blacktext'> ".$_POST['tanggal']."</div><br><div class='sekat'></div>"; // Tampilkan tanggal kunjungan yang dipilih dari halaman formulirbooking.php
        echo "<div class='orangetext'>Tempat Pilihan Anda</div>
                <div class='curved-box'> Wisata Malam Stadion Glora Bangkalan</div><br><div class='sekat'></div>";

        $hargaticketmasuk = $db->prepare("SELECT * from ticket_masuk");
        $hargaticketmasuk->execute();
        $hargaticketmasuk = $hargaticketmasuk->fetchAll(PDO::FETCH_ASSOC);
        $totalpembelian = 0;
        echo "<div class='orangetext'>Jumlah Pembelian Ticket Masuk </div><br>"; // Tampilkan seluruh pembelian ticket masuk orang dan macam macam permainan yang dipilih dari halaman formulirbooking.php lalu berikan total keseluruhannya
        echo "<div class='text-box'>
                <div class='text-item'>Ticket Masuk Wisata</div>
                <div class='text-item'> IDR ".$hargaticketmasuk[0]["harga"]."</div>
                <div class='text-item'> ".$_POST["Ticket_Masuk"]."</div>
                <div class='text-item'>IDR ".$hargaticketmasuk[0]["harga"]*$_POST["Ticket_Masuk"]."</div>
                </div><br><div class='sekat'></div> 
                <div class='orangetext'>Permainan Pilihan Anda</div><br>";
        $totalpembelian+=$hargaticketmasuk[0]["harga"]*$_POST["Ticket_Masuk"];
        
        
        $daftarpermainan = $db->prepare("SELECT * from permainan");
        $daftarpermainan->execute();
        $daftarpermainan = $daftarpermainan->fetchAll(PDO::FETCH_ASSOC);

        $idpembelisekarang = $db->prepare("SELECT COUNT(id_pembeli) from pembeli");
        $idpembelisekarang->execute();
        $idpembelisekarang=$idpembelisekarang->fetchAll(PDO::FETCH_ASSOC);
        $idpembelisekarang = $idpembelisekarang[0]['COUNT(id_pembeli)']+1;

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
        foreach(array_slice($_POST,-6,5,true) as $key => $data){
            echo "<div class='subgrid'>
                <div class='grid-item'>".$key."</div>
                <div class='grid-item'> : </div>
                <div class='grid-item'>".$data."</div>
            </div><br>" ;
        }
        echo"</div>";
        $buatpembeli = $db->prepare("INSERT into pembeli values({$idpembelisekarang},'{$_POST['nama']}','{$_POST['email']}','{$_POST['nohp']}','{$_POST['alamat']}','{$_POST['kota']}'); ");
        $buatpembeli->execute();

        $buatticket = $db->prepare("INSERT into pemesanan_ticketH values('{$kodebooking}','{$_POST['tanggal']}','{$idpembelisekarang}','Ticket_Masuk',{$_POST['Ticket_Masuk']},{$totalpembelian},'01','0');");
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
    </div>";
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

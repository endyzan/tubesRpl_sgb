<?php
    try{

        $db = new PDO("mysql:host=localhost;dbname=wisatastadionbangkalan", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $kodebooking = "SGB" . date('Ymd') . rand(0,100000);
        $cekkodebooking = $db->prepare("SELECT kode_booking from pemesanan_ticketH where kode_booking = '{$kodebooking}'");
        $cekkodebooking->execute();

        while ($cekkodebooking->rowCount() > 0){
            echo "masuk while";
            $kodebooking = "SGB" . date('Ymd') . rand(0,100000);
            $cekkodebooking = $db->prepare("SELECT kode_booking from pemesanan_ticketH where kode_booking = '{$kodebooking}'");
            $cekkodebooking->execute();
        }
        var_dump($_POST);
        echo "Kode Booking Anda : ".$kodebooking."<br>";
        
        echo "Tanggal Kunjungan Anda : ".$_POST['tanggal']."<br>"; // Tampilkan tanggal kunjungan yang dipilih dari halaman formulirbooking.php
        echo "Tempat Pilihan Anda Wisata Malam Stadion Glora Bangkalan<br>";

        $hargaticketmasuk = $db->prepare("SELECT * from ticket_masuk");
        $hargaticketmasuk->execute();
        $hargaticketmasuk = $hargaticketmasuk->fetchAll(PDO::FETCH_ASSOC);
        $totalpembelian = 0;
        echo "Jumlah pembelian : "."<br>"; // Tampilkan seluruh pembelian ticket masuk orang dan macam macam permainan yang dipilih dari halaman formulirbooking.php lalu berikan total keseluruhannya
        echo "Orang ".$hargaticketmasuk[0]["harga"]." ".$_POST["orang"]." ".$hargaticketmasuk[0]["harga"]*$_POST["orang"]."<br> Permainan :<br>";
        $totalpembelian+=$hargaticketmasuk[0]["harga"]*$_POST["orang"];
        
        
        $daftarpermainan = $db->prepare("SELECT * from permainan");
        $daftarpermainan->execute();
        $daftarpermainan = $daftarpermainan->fetchAll(PDO::FETCH_ASSOC);

        $idpembelisekarang = $db->prepare("SELECT id_pembeli from pembeli ORDER by id_pembeli DESC LIMIT 1");
        $idpembelisekarang->execute();
        $idpembelisekarang=$idpembelisekarang->fetchAll(PDO::FETCH_ASSOC);
        $idpembelisekarang = $idpembelisekarang[0]['id_pembeli']+1;

        $permainan = array();

        
        
        foreach ($daftarpermainan as $mainan){
            $permainan[$mainan["id_permainan"]] = array(
                "nama_permainan"=>$mainan["nama_permainan"],
                "durasi"=>$mainan["durasi"],
                "harga"=>$mainan["harga"]
            );
        }

        foreach ($_POST as $key=>$val){
            if (array_key_exists($key,$permainan)){
                echo $key." ".$permainan[$key]["harga"]." ".$val." ".$permainan[$key]["harga"]*$val."<br>";
                $totalpembelian += $permainan[$key]["harga"]*$val;
            }
        }
        echo "<br>Total = ".$totalpembelian;
        echo "<br><br>Data anda : "."<br>"; // Tampilkan Data diri yang di isi dari halaman formulirbooking.php 
        foreach(array_slice($_POST,-6,5,true) as $key => $data){
            echo $key." : ".$data."<br>" ;
        }
        $buatticket = $db->prepare("INSERT into pembeli value('{$idpembelisekarang}','{$_POST['nama']}','{$_POST['email']}','{$_POST['nohp']}','{$_POST['alamat']}','{$_POST['kota']}'
                                    Insert into pemesanan_ticketH value('{$kodebooking}',{$_POST['tanggal']},'{$idpembelisekarang}','orang','{$_POST['orang']}',{$totalpembeliantal},'1','0') 
                                    ");
        $daftarbank = $db->prepare("SELECT * from bank");
        $daftarbank->execute();
        $daftarbank = $daftarbank->fetchAll(PDO::FETCH_ASSOC);
        foreach($daftarbank as $bank){

        }

    }
    catch(PDOException $err){
        echo "Connecting Failed" . $e->getMessage();
    }
?>
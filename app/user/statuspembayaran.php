<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    try{
        require_once "../base.php";
        if(isset($_POST["cekstatus"])){
            $status = $db->prepare("SELECT status from pemesanan_ticketH where kode_booking = '{$_SESSION['kodebooking']}'");
            $status->execute();
            $status = $status->fetchAll(PDO::FETCH_ASSOC);
            echo "<div class='curved-box-title'>KONFIRMASI PEMBAYARAN</div>
                    <div class='kotakabuabubesar'>
                        <div class='left-box'>";
            if ($status[0]["status"]=="1"){
                echo "<form action='nota.php' method='POST'>
                <div class='blacktext'>Horee... Pembayaranmu Sudah Berhasil !</div>
                    <div class='btn-submit-container'><input type='submit' value='Lihat Nota' name='viewnota'></div>
                </form>";
            }
            else{
                echo"<div class='blacktext'>Pembayaran Belum Terkonfirmasi <img src='https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png' alt='WhatsApp' class='whatsapp-logo'> <a href='https://wa.me/6281235304501'>Hubungi Admin</a></div>";
                echo '<form action="statuspembayaran.php" method="POST">
        <div class="btn-submit-container"><input type="submit" value="Refresh" name="cekstatus"></div>
        </form>';
            }
            echo "</div>
            </div>";
        }
    }
    catch(PDOException $err){
        echo "Connecting Failed" . $err->getMessage();
    }


?>
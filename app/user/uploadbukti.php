<link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
<?php
    session_start();
    require_once "../base.php";
    if (isset($_POST['pilih_bank'])) {
            $id_bank = $_POST['bank'];
            // var_dump($id_bank);
            // var_dump($_SESSION['kodebooking']);

            $updateBank = $db->prepare("UPDATE pemesanan_ticketH SET id_bank = :id_bank WHERE kode_booking = :kode_booking");
            $updateBank->bindValue(':id_bank', $id_bank);
            $updateBank->bindValue(':kode_booking', $_SESSION['kodebooking']);
            $updateBank->execute();
        }
        
    echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
            <div class='curved-box-title'>UPLOAD BUKTI PEMBAYARAN</div>
                <div class='kotakabuabubesar'>
                    <div class='left-box'><input type='file' name='image' accept='image/*' required></div>
                    <input type='hidden' name='kodebooking' id='kodebooking' value='{$_SESSION['kodebooking']}'>
                    <div class='btn-submit-container'><input type='submit' value='Upload Gambar' name='submit'></div>
                </div>
    
        
    </form> ";
?>
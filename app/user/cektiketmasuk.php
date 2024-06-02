<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Ticket</title>
    <link rel="stylesheet" href="../../asset/css/styles.css"> <!-- Link ke file CSS eksternal -->
</head>
<body>
<div class='kotakabuabubesar'>
    <form action="cektiketmasuk.php" method="POST">
        <label for='kodebook'>Kode Booking :</label>
        <input type="text" name='kodebook' id='kodebook' required>
        <input type="submit" name='cekkodebook' id='cekkodebook' value="CEK">
    </form>
</div>
</body>
<?php
    session_start();
    if (isset($_POST['cekkodebook'])){
        try{
            require_once "../base.php";
            
            $cek = $db->prepare("SELECT EXISTS(SELECT 1 FROM pemesanan_ticketH WHERE kode_booking = '{$_POST['kodebook']}')");
            $cek->execute();
            $cek = $cek ->fetchColumn();

            echo "<div class='kotakabuabubesar'>";
            if($cek){
                $status = $db->prepare("SELECT status FROM pemesanan_ticketH WHERE kode_booking = '{$_POST['kodebook']}'");
                $status->execute();
                $status = $status ->fetchColumn();
                if($status=="1"){
                    $_SESSION['kodebooking'] = $_POST['kodebook'];
                    echo "<form action='nota.php' method='POST'>
                        <div class='btn-submit-container'><input type='submit' value='Download Nota' name='viewnota'></div>
                    </form>
                    <form action='pesanpermainan.php' method='POST'>
                        <div class='btn-submit-container'><input type='submit' value='Pesan Permainan' name='pesanpermainan'></div>
                    </form>";
                }
                else{
                    echo "<div class='blacktext'>Ticket Tersebut Belum Terbayarkan</div>";
                }
            }
            else{
                echo "<div class='blacktext'>Maaf Kode Booking Tersebut Tidak Ditemukan</div>";
            }
            echo"</div>";

        }
        catch(PDOException $err){
            echo "Connect Fail".$err->getMessage();
        }
    }



?>
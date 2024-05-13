<a>Sudah punya tiket ?</a><br>
<a href="https://siakad.trunojoyo.ac.id/">Download disini</a>
<form action="formulirbooking.php" method="POST">
    <label>Tanggal Berkunjung :</label><br>
    <input type="date" id="tanggal" name="tanggal">

    <label>Ticket masuk stadion :</label><br>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=wisatastadionbangkalan","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $daftarticketmasuk = $db->prepare('SELECT * from ticket_masuk');
        $daftarticketmasuk->execute();
        $daftarticketmasuk = $daftarticketmasuk->fetchAll(PDO::FETCH_ASSOC);
        var_dump($daftarticketmasuk);
        foreach($daftarticketmasuk as $obj){
                echo "<button>",$obj['jenis'],"</button";
        }
        
    }
    catch(PDOException $e){
        echo "Connecting Failed". $e->getMessage();
    }
    ?>
    <input type="submit" id="pesan" name="pesan">
</form>

<?php
if (isset($_POST["pesan"])){
    echo $_POST["tanggal"];
}
?>
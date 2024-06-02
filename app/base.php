<?php
$host = "localhost";
$dbname = "wisatastadionbangkalan";
$dbnameAndi = "rplsgb";
$user = "root";
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbnameAndi);

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

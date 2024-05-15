<?php
define("BASEURL", "http://localhost/tubesRpl_sgb");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"]."/tubesRpl_sgb");

try {
    $db = new PDO('mysql:host=localhost;dbname=rplsgb', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch(PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit();
}

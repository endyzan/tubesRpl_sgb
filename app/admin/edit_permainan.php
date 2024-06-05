<?php
session_start();
include './../base.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_permainan'])) {
    $id_permainan = $_GET['id_permainan'];

    // Fetch the specific permainan data from the database
    try {
        $stmt = $db->prepare("SELECT * FROM permainan WHERE id_permainan = :id_permainan");
        $stmt->execute(['id_permainan' => $id_permainan]);
        $permainan = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_permainan'])) {
    $id_permainan = $_POST['id_permainan'];
    $nama_permainan = $_POST['nama_permainan'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];

    // Update the permainan data in the database
    try {
        $stmt = $db->prepare("UPDATE permainan SET nama_permainan = :nama_permainan, harga = :harga, durasi = :durasi WHERE id_permainan = :id_permainan");
        $stmt->execute([
            'id_permainan' => $id_permainan,
            'nama_permainan' => $nama_permainan,
            'harga' => $harga,
            'durasi' => $durasi,
        ]);
        header("Location: harga_tiket.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Permainan</title>
    <link rel="stylesheet" href="../../asset/css/edit_permainan.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            margin: 20px;
        }

        .main-content {
            padding: 20px;
        }

        h2 {
            margin: 0 0 20px 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            width: 48%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        button[type="button"] {
            background-color: #007bff;
            color: #fff;
            margin-right: 4%;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
        }

        button:hover {
            opacity: 0.9;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div id="content">
            <div class="main-content">
                <h2>Edit Permainan</h2>
                <form method="POST" action="edit_permainan.php">
                    <input type="hidden" name="id_permainan" value="<?php echo $permainan['id_permainan']; ?>">
                    <div>
                        <label for="nama_permainan">Wahana :</label>
                        <input type="text" id="nama_permainan" name="nama_permainan" value="<?php echo $permainan['nama_permainan']; ?>">
                    </div>
                    <div>
                        <label for="harga">Harga :</label>
                        <input type="text" id="harga" name="harga" value="<?php echo $permainan['harga']; ?>">
                    </div>
                    <div>
                        <label for="durasi">Waktu bermain :</label>
                        <input type="text" id="durasi" name="durasi" value="<?php echo $permainan['durasi']; ?> Menit">
                    </div>
                    <div>
                        <button type="button" onclick="window.location.href='harga_tiket.php';">BACK</button>
                        <button type="submit">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

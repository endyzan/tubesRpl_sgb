<?php
session_start(); // Mulai sesi

require_once('./../base.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Ambil informasi admin dari database
$stmt = $conn->prepare('SELECT username, email FROM users WHERE username = ?');
$stmt->bind_param('s', $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

// Proses pembaruan informasi jika ada pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];

    // Update informasi admin
    $stmt = $conn->prepare('UPDATE users SET username = ?, email = ? WHERE username = ?');
    $stmt->bind_param('sss', $newUsername, $newEmail, $_SESSION['username']);
    if ($stmt->execute()) {
        // Update session username
        $_SESSION['username'] = $newUsername;
        // Redirect to setting page
        header('Location: setting.php');
        exit();
    } else {
        echo "Failed to update information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../../asset/css/admin.css" type="text/css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }

        .admin-info, .update-info {
            width: 48%; /* Lebar masing-masing bagian */
        }

        .admin-avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .admin-details h2, .update-info h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #0B30F1;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3760F2;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="admin-info">
            <div class="admin-avatar">
                <img src="https://via.placeholder.com/80" alt="Admin Avatar">
            </div>
            <div class="admin-details">
                <h2>Admin Information</h2>
                <div class="info-item">
                    <label for="username">Username:</label>
                    <span id="username"><?php echo $admin['username']; ?></span>
                </div>
                <div class="info-item">
                    <label for="email">Email:</label>
                    <span id="email"><?php echo $admin['email']; ?></span>
                </div>
            </div>
        </div>
        <div class="update-info">
            <h2>Update Information</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="info-item">
                    <label for="new_username">New Username:</label>
                    <input type="text" id="new_username" name="new_username" value="<?php echo $admin['username']; ?>" required>
                </div>
                <div class="info-item">
                    <label for="new_email">New Email:</label>
                    <input type="email" id="new_email" name="new_email" value="<?php echo $admin['email']; ?>" required>
                </div>
                <input type="submit" value="Update" class="update-btn">
            </form>
        </div>
    </div>

</body>
</html>

<?php
session_start();

require_once('./../base.php');

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

try {
    $stmt = $db->prepare('SELECT username, email FROM users WHERE username = :username');
    $stmt->execute(['username' => $_SESSION['username']]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo "User not found.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];

        $stmt = $db->prepare('UPDATE users SET username = :new_username, email = :new_email WHERE username = :username');
        if ($stmt->execute(['new_username' => $newUsername, 'new_email' => $newEmail, 'username' => $_SESSION['username']])) {
            $_SESSION['username'] = $newUsername;
            header('Location: setting.php');
            exit();
        } else {
            echo "Failed to update information.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../../asset/css/admdashboard.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"> <!-- Memuat Bootstrap Icons -->
</head>
<body>
    <div class="container-setting">
        <div class="setting-core">
            <a href="dashboard.php" class="icon-link">
                <i class="bi bi-arrow-left-circle arrow-icon"></i>
            </a>
            <div class="admin-info">
                <div class="admin-details">
                    <h2>Admin Information</h2>
                    <div class="info-item">
                        <label for="username">Username:</label>
                        <span id="username"><?php echo htmlspecialchars($admin['username']); ?></span>
                    </div>
                    <div class="info-item">
                        <label for="email">Email:</label>
                        <span id="email"><?php echo htmlspecialchars($admin['email']); ?></span>
                    </div>
                </div>
            </div>
            <div class="update-info">
                <h2>Update Information</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="info-item">
                        <label for="new_username">New Username:</label> <br>
                        <input type="text" id="new_username" name="new_username" value="<?php echo htmlspecialchars($admin['username']); ?>" required>
                    </div>
                    <div class="info-item">
                        <label for="new_email">New Email:</label> <br>
                        <input type="email" id="new_email" name="new_email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
                    </div>
                    <input type="submit" value="Update" class="update-btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

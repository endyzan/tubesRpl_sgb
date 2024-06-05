<?php
session_start(); // Mulai sesi

require_once './../base.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($password == $user['password']) { // In real-world application, use password_hash and password_verify
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email']; // Simpan email ke sesi
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../../asset/css/admin.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="foto"></div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Email Address</h2>
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>
                <h2>Password</h2>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" name="login" value="Login" class="login-btn">
            </form>
        </div>
    </div>
    <?php
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>
</body>
</html>

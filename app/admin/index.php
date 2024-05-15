<?php
require_once './../base.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $db->query($sql);
    if ($result->rowCount() > 0) {
        header("Location: beranda.php");
        exit();
    } else {
        $login_error = "Login gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
?>

<nav class="navbar">
    <div class="navbar-right">
        <div class="dropdown">
            <button class="dropbtn"><i class="bi bi-person-circle person-admin"></i>Admin<i class="bi bi-caret-down-fill arrow-admin"></i></button>
            <div class="dropdown-content">
                <a>
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </a>
                <a>
                    <?php echo htmlspecialchars($_SESSION['email']); ?>
                </a>
                <a href="./setting.php">
                    <i class="bi bi-gear-fill"></i>Settings
                </a>
                <a href="./logout.php">
                    <i class="bi bi-box-arrow-right"></i>Sign Out
                </a>
            </div>
        </div>
    </div>
</nav>

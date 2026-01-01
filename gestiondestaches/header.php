<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<hr>
<a href="dashboard.php">Dashboard</a> |
<a href="logout.php">Déconnexion</a>
<hr>

<?php
session_start();
require __DIR__ . "/config/db.php";

if (isset($_POST['btnLogin'])) {

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

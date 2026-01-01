<?php
require '../db.php';
require '../auth.php';

$user = $_SESSION['user'];

if (!isset($_GET['id'])) {
    header("Location:c:\L2GL\htdocs\G3\gestionsdestaches\dashboard.php");
    exit();
}

$id = (int)$_GET['id'];

// Vérifie que l'utilisateur est admin ou propriétaire
if ($user['role'] === 'admin') {
    $sql = "DELETE FROM taches WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
} else {
    $sql = "DELETE FROM taches WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user['id']]);
}

header("Location: ../dashboard.php");
exit();

<?php
require '../db.php';
require '../auth.php';

$user = $_SESSION['user'];

if (!isset($_GET['id'])) {
    header("Location: ../dashboard.php");
    exit();
}

$id = (int)$_GET['id'];

// Vérifie que l'utilisateur est admin ou propriétaire
if ($user['role'] === 'admin') {
    $sql = "UPDATE taches SET statut = 'terminée' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
} else {
    $sql = "UPDATE taches SET statut = 'terminée' WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user['id']]);
}

header("Location: ../dashboard.php");
exit();

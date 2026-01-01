<?php
session_start();
require __DIR__ . "/../config/db.php";

if (!isset($_SESSION['user'])) {
    header("Location:c:L2GL\htdocs\G3\gestiondestaches\login.php");
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO taches (user_id, titre, description) VALUES (?, ?, ?)");
    $stmt->execute([$user['id'], $titre, $description]);

    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Nouvelle tâche</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Ajouter une tâche</h2>
<form method="post">
    <div class="mb-3">
        <input type="text" name="titre" class="form-control" placeholder="Titre" required>
    </div>
    <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description"></textarea>
    </div>
    <button class="btn btn-success">Ajouter</button>
    <a class="btn btn-secondary" href="list.php">Retour</a>
</form>
</div>
</body>
</html>

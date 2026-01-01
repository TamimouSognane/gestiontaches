<?php
require '../db.php';
require '../auth.php'; // protège la page

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $sql = "INSERT INTO taches (user_id, titre, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user['id'], $titre, $description]);

    header("Location: ../dashboard.php");
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
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="../dashboard.php" class="btn btn-secondary">Retour</a>
    </form>
</div>

</body>
</html>

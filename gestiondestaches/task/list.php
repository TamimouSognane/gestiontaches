<?php
session_start();
require __DIR__ . "/../config/db.php";

if (!isset($_SESSION['user'])) {
    header("Location:c:L2GL\htdocs\G3\gestiondestaches\login.php");
    exit();
}

$user = $_SESSION['user'];

// Récupère les tâches
if ($user['role'] === 'admin') {
    $stmt = $pdo->query("SELECT t.*, u.username FROM taches t JOIN users u ON t.user_id = u.id ORDER BY t.id DESC");
    $taches = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->prepare("SELECT * FROM taches WHERE user_id = ? ORDER BY id DESC");
    $stmt->execute([$user['id']]);
    $taches = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Mes tâches</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2>Mes tâches</h2>
<a class="btn btn-success mb-3" href="add.php">➕ Nouvelle tâche</a>
<a class="btn btn-secondary mb-3" href="../index.php">← Retour</a>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Statut</th>
    <?php if($user['role'] === 'admin') echo "<th>Utilisateur</th>"; ?>
    <th>Actions</th>
</tr>

<?php foreach($taches as $t): ?>
<tr>
    <td><?= $t['id'] ?></td>
    <td><?= htmlspecialchars($t['titre']) ?></td>
    <td><?= htmlspecialchars($t['description']) ?></td>
    <td><?= $t['statut'] ?></td>
    <?php if($user['role'] === 'admin') echo "<td>" . htmlspecialchars($t['username']) . "</td>"; ?>
    <td>
        <?php if($t['statut'] === 'en cours'): ?>
            <a class="btn btn-sm btn-success" href="terminer.php?id=<?= $t['id'] ?>">✔ Terminer</a>
        <?php endif; ?>
        <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $t['id'] ?>">❌ Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</div>
</body>
</html>

<?php
require 'db.php';
require 'auth.php'; // protection + session

include 'header.php';

$user = $_SESSION['user'];

if ($user['role'] === 'admin') {
    $req = $pdo->query("
        SELECT t.*, u.username 
        FROM taches t 
        JOIN users u ON t.user_id = u.id
        ORDER BY t.id DESC
    ");
} else {
    $req = $pdo->prepare("SELECT * FROM taches WHERE user_id = ? ORDER BY id DESC");
    $req->execute([$user['id']]);
}

$taches = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>
    Bienvenue <?= htmlspecialchars($user['username']) ?>
    (<?= htmlspecialchars($user['role']) ?>)
</h2>

<a href="taches/add.php">➕ Nouvelle tâche</a>

<?php if ($user['role'] === 'admin'): ?>
 | <a href="admin/users.php">👥 Gérer utilisateurs</a>
<?php endif; ?>

<table border="1" cellpadding="5">
<tr>
    <th>Titre</th>
    <th>Description</th>
    <th>Statut</th>
    <th>Action</th>
</tr>

<?php foreach ($taches as $t): ?>
<tr>
    <td><?= htmlspecialchars($t['titre']) ?></td>
    <td><?= htmlspecialchars($t['description']) ?></td>
    <td><?= htmlspecialchars($t['statut']) ?></td>
    <td>
        <a href="taches/terminer.php?id=<?= (int)$t['id'] ?>">✔</a>
        <a href="taches/delete.php?id=<?= (int)$t['id'] ?>" onclick="return confirm('Supprimer cette tâche ?')">❌</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>

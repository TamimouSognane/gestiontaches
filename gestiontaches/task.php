<?php
require 'login.php';
require 'db.php';

if ($_SESSION['user']['role'] == 'admin') {
    $req = $pdo->query("SELECT t.*, u.username FROM taches t JOIN users u ON t.user_id=u.id");
} else {
    $req = $pdo->prepare("SELECT * FROM taches WHERE user_id=?");
    $req->execute([$_SESSION['user']['id']]);
}
$taches = $req->fetchAll();
?>

<a href="add_task.php">Ajouter tâche</a>

<?php foreach ($taches as $t): ?>
    <p>
        <?= $t['titre'] ?> - <?= $t['statut'] ?>
        <a href="done_task.php?id=<?= $t['id'] ?>">✔</a>
        <a href="delete_task.php?id=<?= $t['id'] ?>">❌</a>
    </p>
<?php endforeach; ?>

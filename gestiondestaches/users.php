<?php
require 'login.php';
require 'db.php';

if ($_SESSION['user']['role'] != 'admin') {
    die("Accès refusé");
}

$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>

<h2>Utilisateurs</h2>
<a href="add_user.php">Ajouter</a>

<?php foreach ($users as $u): ?>
    <p>
        <?= $u['username'] ?> (<?= $u['role'] ?>)
        <a href="delete_user.php?id=<?= $u['id'] ?>">Supprimer</a>
    </p>
<?php endforeach; ?>

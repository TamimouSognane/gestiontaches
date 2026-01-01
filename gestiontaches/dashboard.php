<?php
require 'login.php';
?>

<h2>Bienvenue <?= $_SESSION['user']['username'] ?></h2>

<a href="tasks.php">Mes tâches</a>

<?php if ($_SESSION['user']['role'] == 'admin'): ?>
    | <a href="users.php">Gestion utilisateurs</a>
<?php endif; ?>

| <a href="login.php">Déconnexion</a>

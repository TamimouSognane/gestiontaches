<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card shadow">
<div class="card-body">
<h3>Bienvenue <?= htmlspecialchars($user['username']) ?></h3>
<p>Rôle : <?= htmlspecialchars($user['role']) ?></p>

<a class="btn btn-primary m-1" href="tasks/list.php">Mes tâches</a>
<?php if($user['role']==='admin'): ?>
<a class="btn btn-warning m-1" href="admin/users.php">Gestion utilisateurs</a>
<a class="btn btn-info m-1" href="admin/dashboard.php">Dashboard</a>
<?php endif; ?>
<a class="btn btn-danger m-1" href="auth/logout.php">Déconnexion</a>
</div>
</div>
</div>
</body>
</html>

<?php

require 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $req = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=? LIMIT 1");
    $req->execute([$username, $password]);
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        $erreur = "Login ou mot de passe incorrect";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Login" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button name="login">Connexion</button>
</form>

<?php if (isset($erreur)) echo "<p>$erreur</p>"; ?>

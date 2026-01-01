<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=gestiontaches;charset=utf8mb4",
        "root",
        "" // mot de passe de MySQL si tu en as un
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur connexion DB : " . $e->getMessage());
}
?>
<?php

// Début du bloc try
// Le try permet de tester la connexion à la base de données
// et de capturer les erreurs éventuelles
try {

    // Création d’un nouvel objet PDO pour se connecter à MySQL
    // mysql:host=localhost      → serveur de base de données (local)
    // dbname=gestion_taches     → nom de la base de données
    // charset=utf8              → encodage des caractères (accents)
 

    $db = new PDO(
        "mysql:host=localhost;dbname=gestion_taches;charset=utf8",
        "root",   // Nom d'utilisateur MySQL
        ""        // Mot de passe MySQL (vide en local avec XAMPP/WAMP)
    );

    // Configuration du mode d’erreur de PDO
    // PDO::ERRMODE_EXCEPTION signifie que les erreurs
    // seront affichées sous forme d’exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Bloc catch : s’exécute si une erreur survient dans le try

    // Arrête l’exécution du script
    // et affiche le message d’erreur retourné par PDO
    die("Erreur de connexion : " . $e->getMessage());
}
?>

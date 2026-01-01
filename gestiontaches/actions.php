<?php
include 'db.php';

// 1. AJOUTER
if (isset($_POST['action']) && $_POST['action'] === 'ajouter') {
    

    header("Location: index.php");
    exit;
}

// 2. SUPPRIMER
if (isset($_GET['supprimer'])) {
    

    header("Location: index.php");
    exit;
}

// 3. RÉCUPÉRER POUR MODIFIER
$tache_a_modifier = null;

if (isset($_GET['modifier'])) {

  
    $tache_a_modifier = $stmt->fetch();
}

// 4. MODIFIER
if (isset($_POST['action']) && $_POST['action'] === 'modifier') {

   

    header("Location: index.php");
    exit;
}

// 5. RÉCUPÉRER LISTE DES TACHES
$taches = $db->query("SELECT * FROM taches ORDER BY id DESC")->fetchAll();

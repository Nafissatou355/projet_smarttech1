<?php
// delete_document.php : Suppression d'un document
require '../db.php';
$id = $_GET['id'];

// Récupérer le chemin du fichier
$stmt = $pdo->prepare("SELECT file_path FROM documents WHERE id = ?");
$stmt->execute([$id]);
$document = $stmt->fetch(PDO::FETCH_ASSOC);

if ($document) {
    // Supprimer le fichier du serveur
    if (file_exists($document['file_path'])) {
        unlink($document['file_path']);
    }
    
    // Supprimer l'entrée de la base de données
    $pdo->prepare("DELETE FROM documents WHERE id = ?")->execute([$id]);
}

header("Location: liste.php");
?>

<?php
// update_document.php : Modification d'un document
require '../db.php';
$id = $_GET['id'];
$document = $pdo->query("SELECT * FROM documents WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    
    if (!empty($_FILES['file']['name'])) {
        $file_name = basename($_FILES['file']['name']);
        $file_path = "uploads/" . $file_name;
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            // Supprimer l'ancien fichier
            if (file_exists($document['file_path'])) {
                unlink($document['file_path']);
            }
            // Mettre à jour avec le nouveau fichier
            $stmt = $pdo->prepare("UPDATE documents SET title=?, file_path=? WHERE id=?");
            $stmt->execute([$title, $file_path, $id]);
        }
    } else {
        // Mise à jour uniquement du titre
        $stmt = $pdo->prepare("UPDATE documents SET title=? WHERE id=?");
        $stmt->execute([$title, $id]);
    }
    header("Location: liste.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un document</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="title" value="<?= $document['title'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Fichier actuel</label>
                <p><a href="<?= $document['file_path'] ?>" target="_blank">Voir le document</a></p>
            </div>
            <div class="mb-3">
                <label>Nouveau fichier (optionnel)</label>
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>

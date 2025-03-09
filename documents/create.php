<?php
// upload_document.php : Ajout d'un document
require '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $title = $_POST['title'];
    $file_name = basename($_FILES['file']['name']);
    $file_path = "uploads/" . $file_name;
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        $stmt = $pdo->prepare("INSERT INTO documents (title, file_path) VALUES (?, ?)");
        $stmt->execute([$title, $file_path]);
        header("Location: liste.php");
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un document</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Fichier</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Uploader</button>
        </form>
    </div>
</body>
</html>

<?php
// index_document.php : Liste des documents
require '../db.php';
$documents = $pdo->query("SELECT * FROM documents")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des documents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des documents</h2>
        <a href="create.php" class="btn btn-primary">Ajouter un document</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Fichier</th>
                    <th>Date d'ajout</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?= $document['id'] ?></td>
                    <td><?= $document['title'] ?></td>
                    <td><a href="<?= $document['file_path'] ?>" target="_blank">Voir</a></td>
                    <td><?= $document['uploaded_at'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $document['id'] ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete.php?id=<?= $document['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

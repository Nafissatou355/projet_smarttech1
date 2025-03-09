<?php
// create_client.php : Ajout d'un client
require '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $stmt = $pdo->prepare("INSERT INTO clients (name, email, company) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $company]);
    header("Location: liste.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un client</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Entreprise</label>
                <input type="text" name="company" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
</body>
</html>

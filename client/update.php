<?php
// update_client.php : Modification d'un client
require '../db.php';
$id = $_GET['id'];
$client = $pdo->query("SELECT * FROM clients WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $stmt = $pdo->prepare("UPDATE clients SET name=?, email=?, company=? WHERE id=?");
    $stmt->execute([$name, $email, $company, $id]);
    header("Location: liste.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un client</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" value="<?= $client['name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="<?= $client['email'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Entreprise</label>
                <input type="text" name="company" value="<?= $client['company'] ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>

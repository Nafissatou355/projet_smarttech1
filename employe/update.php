<?php
// update.php : Modification d'un employé
require '../db.php';
$id = $_GET['id'];
$employee = $pdo->query("SELECT * FROM employees WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $stmt = $pdo->prepare("UPDATE employees SET name=?, email=?, position=? WHERE id=?");
    $stmt->execute([$name, $email, $position, $id]);
    header("Location: liste.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un employé</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" value="<?= $employee['name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="<?= $employee['email'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Poste</label>
                <input type="text" name="position" value="<?= $employee['position'] ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>

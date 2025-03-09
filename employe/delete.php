<?php
// delete.php : Suppression d'un employé
require '../db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM employees WHERE id = ?")->execute([$id]);
header("Location: liste.php");
?>

<?php
// delete_client.php : Suppression d'un client
require '../db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM clients WHERE id = ?")->execute([$id]);
header("Location: liste.php");
?>

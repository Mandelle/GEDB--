<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM plants WHERE id = ?");
$stmt->execute([$id]);
header('Location: index.php');
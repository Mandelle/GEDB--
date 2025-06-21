<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM plants WHERE id = ?");
$stmt->execute([$id]);
$plant = $stmt->fetch();
if (!$plant) die("Plante introuvable.");
?>
<h2><?= htmlspecialchars($plant['name']) ?></h2>
<ul>
<li>Espèce : <?= htmlspecialchars($plant['species']) ?></li>
<li>Lumière : <?= htmlspecialchars($plant['sunlight']) ?></li>
<li>Arrosage : <?= htmlspecialchars($plant['watering']) ?></li>
<li>Hauteur : <?= $plant['height_cm'] ?> cm</li>
<li>Animaux : <?= $plant['pet_friendly'] ? "Oui" : "Non" ?></li>
</ul>
<a href="edit.php?id=<?= $plant['id'] ?>">Modifier</a> |
<a href="delete.php?id=<?= $plant['id'] ?>" onclick="return confirm('Supprimer cette plante ?')">Supprimer</a>
<?php include 'db.php'; ?>
<h1>Liste des plantes</h1>
<a href="create.php">Ajouter une plante</a>
<ul>
<?php
$stmt = $pdo->query("SELECT * FROM plants");
while ($plant = $stmt->fetch()) {
    echo "<li><a href='view.php?id={$plant['id']}'>" . htmlspecialchars($plant['name']) . "</a></li>";
}
?>
</ul>

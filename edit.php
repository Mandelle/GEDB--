<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM plants WHERE id = ?");
$stmt->execute([$id]);
$plant = $stmt->fetch();
if (!$plant) die("Plante introuvable.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE plants SET name=?, species=?, sunlight=?, watering=?, pet_friendly=?, height_cm=? WHERE id=?");
    $stmt->execute([
        $_POST['name'], $_POST['species'], $_POST['sunlight'],
        $_POST['watering'], isset($_POST['pet_friendly']) ? 1 : 0, $_POST['height_cm'], $id
    ]);
    header("Location: view.php?id=$id");
}
?>
<h2>Modifier la plante</h2>
<form method="POST">
Nom : <input name="name" value="<?= htmlspecialchars($plant['name']) ?>"><br>
Espèce : <input name="species" value="<?= htmlspecialchars($plant['species']) ?>"><br>
Lumière : <input name="sunlight" value="<?= htmlspecialchars($plant['sunlight']) ?>"><br>
Arrosage : <input name="watering" value="<?= htmlspecialchars($plant['watering']) ?>"><br>
Hauteur (cm) : <input type="number" name="height_cm" value="<?= $plant['height_cm'] ?>"><br>
Compatible animaux : <input type="checkbox" name="pet_friendly" <?= $plant['pet_friendly'] ? "checked" : "" ?>><br>
    <button type="submit">Modifier</button>
</form>
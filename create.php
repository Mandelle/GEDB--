<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $stmt = $pdo->prepare("INSERT INTO plants (name, species, sunlight, watering, pet_friendly, height_cm)
     VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
$_POST['name'], $_POST['species'], $_POST['sunlight'],
$_POST['watering'], isset($_POST['pet_friendly']) ? 1 : 0, $_POST['height_cm']
    ]);
header('Location: index.php');
}
?>
<h2>Ajouter une plante</h2>
<form method="POST">
Nom : <input name="name"><br>
Espèce : <input name="species"><br>
Lumière : <input name="sunlight"><br>
Arrosage : <input name="watering"><br>
Hauteur (cm) : <input type="number" name="height_cm"><br>
Compatible animaux : <input type="checkbox" name="pet_friendly"><br>
    <button type="submit">Créer</button>
</form>
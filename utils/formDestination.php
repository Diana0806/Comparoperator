
<?php require('../config/database.php') ?>
<form action="./insertDestination.php" method="post">
    <input type="hidden" name="id">
    <label for="location">La location :</label>
    <input type="text" name="location" required><br>

    <label for="price">Le prix :</label>
    <input type="text" name="price" required><br>

    <label for="tour_operator">Tour Opérateur :</label>
    <select name="tour_operator" required>
        <option value="">Sélectionnez un tour opérateur</option>
        <?php
        // Remplacez les lignes suivantes par votre code pour récupérer les tour-opérateurs depuis la base de données
        $pdo = getPdo();
        $query = $pdo->query('SELECT id, name FROM tour_operator');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
        ?>
    </select><br>

    <input type="submit" name="submit" value="Ajouter">
</form>

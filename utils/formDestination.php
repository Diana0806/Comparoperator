

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Ajouter une Destination</h2>
            <form action="./utils/insertDestination.php" method="post">
                <div class="mb-3">
                    <label for="location" class="form-label">La location :</label>
                    <input type="text" name="location" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Le prix :</label>
                    <input type="text" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tour_operator" class="form-label">Tour Opérateur :</label>
                    <select name="tour_operator" class="form-select" required>
                        <option value="">Sélectionnez un tour opérateur</option>
                        <?php
                        // Remplacez les lignes suivantes par votre code pour récupérer les tour-opérateurs depuis la base de données
                        $pdo = getPdo();
                        $query = $pdo->query('SELECT id, name FROM tour_operator');
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>


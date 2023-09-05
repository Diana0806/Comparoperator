
<?php
$tourOperatorId = $_GET['tour_operator_id']; // Récupérez l'ID du tour-opérateur à partir de l'URL
?>

<form action="traitement_commentaire.php" method="post">
    <input type="hidden" name="tour_operator_id" value="<?php echo $tourOperatorId; ?>">
    
    <label for="message">Votre commentaire :</label>
    <textarea name="message" rows="4" required></textarea><br>

    <label for="author_name">Nom de l'auteur :</label>
    <input type="text" name="author_name" required><br>

    <input type="submit" name="submit" value="Ajouter le commentaire">
</form>

<?php
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $authorName = $_POST['author_name'];
    $tourOperatorId = $_POST['tour_operator_id'];

    // ... (code pour vérifier et insérer le commentaire dans la base de données, comme précédemment)
    
    // Redirigez l'utilisateur vers une page de confirmation ou effectuez d'autres actions selon vos besoins
    header('Location: confirmation_commentaire.php');
}
?>
Dans le fichier de traitement (traitement_commentaire.php), vous pouvez utiliser les données soumises, y compris l'ID du tour-opérateur, pour insérer le commentaire dans la base de données comme précédemment.

Ainsi, l'utilisateur peut sélectionner un tour-opérateur en cliquant sur un






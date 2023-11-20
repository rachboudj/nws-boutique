<?php $title = "Informations d'Expédition"; ?>

<?php ob_start(); ?>

<h1>Informations d'Expédition</h1>
<form action="index.php?page=recapCommande" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="adresse">Adresse complète :</label>
    <input type="text" id="adresse" name="adresse" required>

    <label for="telephone">Numéro de téléphone :</label>
    <input type="text" id="telephone" name="telephone" required>

    <button type="submit">Continuer</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
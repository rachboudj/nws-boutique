<?php $title = "Ajouter un produit"; ?>

<?php ob_start(); ?>

<h1>Ajouter un produit</h1>
<form method="POST" action="index.php?page=ajoutProduits">
    <label for="nom">Nom</label>
    <input type="text" name="nom">
    <span class="error"><?php if (!empty($errors['nom'])) {
                            echo $errors['nom'];
                        } ?></span>

    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {
                            echo $errors['description'];
                        } ?></span>

    <label for="image">Image</label>
    <input type="text" name="image">
    <span class="error"><?php if (!empty($errors['image'])) {
                            echo $errors['image'];
                        } ?></span>

    <label for="quantite">Quantité</label>
    <input type="number" name="quantite">
    <span class="error"><?php if (!empty($errors['quantite'])) {
                            echo $errors['quantite'];
                        } ?></span>

    <label for="prix">Prix</label>
    <input type="number" name="prix" step="0.01">
    <span class="error"><?php if (!empty($errors['prix'])) {
                            echo $errors['prix'];
                        } ?></span>

    <input class="buttons" type="submit" name="submit" value="Ajouter un produit">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
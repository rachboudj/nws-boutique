<?php $title = "Modifier un produit"; ?>

<?php ob_start(); ?>

<h1>Modifier un produit</h1>
<form method="POST" action="index.php?page=modifProduits&produitId=<?= htmlspecialchars($id) ?>">
    <label for="nom">Nom</label>
    <input type="text" name="nom" value="<?php
                                            if (isset($produits['nom'])) {
                                                echo $produits['nom'];
                                            } ?>">
    <span class="error"><?php if (!empty($errors['nom'])) {
                            echo $errors['nom'];
                        } ?></span>

    <label for="description">Description</label>
    <textarea name="description"><?php
                                    if (isset($produits['description'])) {
                                        echo $produits['description'];
                                    } ?></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {
                            echo $errors['description'];
                        } ?></span>

    <label for="image">Image</label>
    <input type="text" name="image" value="<?php
                                            if (isset($produits['image'])) {
                                                echo $produits['image'];
                                            } ?>">
    <span class="error"><?php if (!empty($errors['image'])) {
                            echo $errors['image'];
                        } ?></span>

    <label for="quantite">Quantité</label>
    <input type="number" name="quantite" value="<?php
                                                if (isset($produits['quantite'])) {
                                                    echo $produits['quantite'];
                                                } ?>">

    <label for="prix">Prix</label>
    <input type="number" name="prix" step="0.01" value="<?php
                                                        if (isset($produits['prix'])) {
                                                            echo $produits['prix'];
                                                        } ?>">
    <span class="error"><?php if (!empty($errors['prix'])) {
                            echo $errors['prix'];
                        } ?></span>

    <input class="buttons" type="submit" name="submit" value="Modifier un produit">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
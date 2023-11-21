<?php $title = $produits['nom']; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="container-image">
        <img src="<?= $produits['image']; ?>" alt="<?= $produits['nom']; ?>">
    </div>

    <div class="text-container">
        <h2><?= $produits['nom']; ?></h2>
        <span>Prix : <?= $produits['prix']; ?></span>
        <p>Il reste <?= $produits['quantite']; ?> produit(s)</p>
        <p>Description : <?= $produits['description']; ?></p>
        <?php if ($produits['quantite'] > 0) : ?>
            <button><a href="index.php?page=ajoutPanier&produitId=<?= $produits['id_produit']; ?>">Ajouter au panier</a></button>
        <?php else : ?>
            <span>Épuisé</span>
        <?php endif; ?>
    </div>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
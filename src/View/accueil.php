<?php $title = "Accueil de NWS Boutique"; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur NWS Boutique !</h1>

<div class="container">
    <div class="card">
        <?php foreach ($produits as $produit) { ?>
            <img src="<?= $produit['image']; ?>" alt="<?= $produit['nom']; ?>">
            <h3><?= $produit['nom']; ?></h3>
            <span>Prix : <?= $produit['prix']; ?></span>
            <?php if ($produit['quantite'] > 0) : ?>
                <button><a href="index.php?page=ajoutPanier&produitId=<?= $produit['id_produit']; ?>">Ajouter au panier</a></button>
            <?php else : ?>
                <span>Épuisé</span>
            <?php endif; ?>
        <?php } ?>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
<?php $title = "Accueil de NWS Boutique"; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur NWS Boutique !</h1>

<div class="container">
    <div class="card">
        <?php foreach ($produits as $produit) { ?>
            <img src="<?= $produit['image']; ?>" alt="<?= $produit['nom']; ?>">
            <h3><?= $produit['nom']; ?></h3>
            <span><?= $produit['prix']; ?></span>
            <button><a href="">Ajouter au panier</a></button>
        <?php } ?>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
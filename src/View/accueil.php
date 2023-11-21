<?php $title = "Accueil de NWS Boutique"; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur NWS Boutique !</h1>

<form method="GET">
    <input class="inputSearch" type="text" name="search" placeholder="Rechercher un produit...">
    <input class="btn-1" type="submit" value="Rechercher">
</form>

<h2>Derniers produits ajoutés</h2>
<div class="container">
        <?php foreach ($produits as $produit) { ?>
    <div class="card">
            <img src="<?= $produit['image']; ?>" alt="<?= $produit['nom']; ?>">
            <a href="index.php?page=detailsProduits&produitId=<?= $produit['id_produit']; ?>"><?= $produit['nom']; ?></a>
            <span><?= $produit['prix']; ?> €</span>
            <?php if ($produit['quantite'] > 0) : ?>
                <button><a href="index.php?page=ajoutPanier&produitId=<?= $produit['id_produit']; ?>">Ajouter au panier</a></button>
            <?php else : ?>
                <span>Épuisé</span>
            <?php endif; ?>
    </div>
        <?php } ?>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
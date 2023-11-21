<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="./assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <header>
            <div class="logo">NWS Boutique</div>
            <nav>
                <ul>
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=produits">Produits admin</a></li>
                    <li><a href="index.php?page=ajoutProduits">Ajouter un produit</a></li>
                    <li><a href="index.php?page=affichPanier">Panier</a></li>
                </ul>
            </nav>
        </header>
        <?= $content ?>
    </body>
</html>
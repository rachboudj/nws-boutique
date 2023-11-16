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
                    <li><a href="index.php?page=produits">Produits</a></li>
                    <li><a href="index.php?page=inscription">Inscription</a></li>
                    <li><a href="">Panier</a></li>
                    <li><a href="">Produits admin</a></li>
                </ul>
            </nav>
        </header>
        <?= $content ?>
    </body>
</html>
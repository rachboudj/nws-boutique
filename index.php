<?php 

require_once "./src/Database/Database.php";

require_once('src/Controller/accueil.php');
require_once('src/Controller/produits.php');
require_once('src/Controller/inscription.php');

if (isset($_GET['page'])) {
    if ($_GET['page'] === 'accueil') {
        accueil();
    } elseif ($_GET['page'] === 'produits') {
        affichProduits();
    } elseif ($_GET['page'] === 'ajoutProduits') {
        ajoutProduits();
    } elseif ($_GET['page'] === 'modifProduits') {
        modifProduits();
    } elseif ($_GET['page'] === 'supprProduits') {
        supprProduits();
    }  elseif ($_GET['page'] === 'inscription') {
        inscription();
    }
} else {
    accueil();
}
<?php 

require_once "./src/Database/Database.php";

require_once('src/Controller/accueil.php');
require_once('src/Controller/produits.php');
require_once('src/Controller/inscription.php');
require_once('src/Controller/panier.php');
require_once('src/Controller/commande.php');

session_start();

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
    } elseif ($_GET['page'] === 'ajoutPanier') {
        ajoutPanier();
    } elseif ($_GET['page'] === 'affichPanier') {
        affichPanier();
    } elseif ($_GET['page'] === 'detailsProduits') {
        detailsProduits();
    } elseif ($_GET['page'] === 'reduireQuantitePanier') {
        reduireQuantitePanier();
    } elseif ($_GET['page'] === 'augmenterQuantitePanier') {
        augmenterQuantitePanier();
    } elseif ($_GET['page'] === 'infoExpedition') {
        infoExpedition();
    } elseif ($_GET['page'] === 'recapCommande') {
        recapCommande();
    } elseif ($_GET['page'] === 'commandeComplete') {
        afficherConfirmationCommande();
    } elseif ($_GET['page'] === 'inscription') {
        inscription();
    }
} else {
    accueil();
}
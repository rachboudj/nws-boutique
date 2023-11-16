<?php 

require_once "./src/Database/Database.php";

require_once('src/Controller/accueil.php');
require_once('src/Controller/produits.php');
require_once('src/Controller/inscription.php');

if (isset($_GET['page'])) {
    if ($_GET['page'] === 'accueil') {
        accueil();
    } elseif ($_GET['page'] === 'produits') {
        produits();
    } elseif ($_GET['page'] === 'inscription') {
        inscription();
    }
} else {
    accueil();
}
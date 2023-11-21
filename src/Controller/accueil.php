<?php 

require_once './src/Model/produits.php';


function accueil() {
    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $pdo = (new Database())->getPdo();
        $model = new ProduitsModel($pdo);
        $termeRecherche = '%' . $_GET['search'];
        $produits = $model->rechercheProduit($termeRecherche);
    } else {
        $produits = $model->showProducts();
    }

    require('./src/View/accueil.php');
}
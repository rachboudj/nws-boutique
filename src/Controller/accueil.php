<?php 

require_once './src/Model/produits.php';


function accueil() {
    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    $produits = $model->showProducts();

    require('./src/View/accueil.php');
}
<?php

require_once './src/Model/produits.php';

function ajoutPanier() {
    $pdo = (new Database())->getPdo();
    $produitsModel = new ProduitsModel($pdo);

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    if (isset($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $idProduit = $_GET['produitId'];
        $detailsProduit = $produitsModel->getDetailsProduit($idProduit);

        if (!isset($_SESSION['panier'][$idProduit])) {
            $_SESSION['panier'][$idProduit] = [
                'nom' => $detailsProduit['nom'],
                'prix' => $detailsProduit['prix'],
                'quantite' => 1
            ];
        } else {
            $_SESSION['panier'][$idProduit]['quantite']++;
        }

        header('Location: index.php?page=accueil');
    }
}


function affichPanier() {

    require './src/View/panier/affichPanier.php';
    
}
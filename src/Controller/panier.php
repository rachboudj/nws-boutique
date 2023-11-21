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

function reduireQuantitePanier() {
    if (isset($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $idProduit = $_GET['produitId'];

        if (isset($_SESSION['panier'][$idProduit])) {
            if ($_SESSION['panier'][$idProduit]['quantite'] > 1) {
                $_SESSION['panier'][$idProduit]['quantite']--;
            } else {
                unset($_SESSION['panier'][$idProduit]);
            }
        }

        header('Location: index.php?page=affichPanier');
        exit();
    }
}

function augmenterQuantitePanier() {
    $pdo = (new Database())->getPdo();
    $produitsModel = new ProduitsModel($pdo);

    if (isset($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $idProduit = $_GET['produitId'];

        $detailsProduit = $produitsModel->getDetailsProduit($idProduit);

        if (isset($_SESSION['panier'][$idProduit])) {
            if ($_SESSION['panier'][$idProduit]['quantite'] < $detailsProduit['quantite']) {
                $_SESSION['panier'][$idProduit]['quantite']++;
            } else {
                echo "Quantité maximale atteinte pour ce produit.";
            }
        }

        header('Location: index.php?page=affichPanier');
        exit();
    }
}


function affichPanier() {

    require './src/View/panier/affichPanier.php';
    
}
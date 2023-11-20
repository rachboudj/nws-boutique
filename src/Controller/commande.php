<?php

require_once './src/Model/commande.php';
require_once './src/Controller/panier.php';


function infoExpedition() {

    require('./src/View/commande/infoExpedition.php');
}

function recapCommande() {
    if (!isset($_POST['nom']) || !isset($_POST['adresse']) || !isset($_POST['telephone'])) {
        header('Location: index.php?page=infoExpedition');
        exit();
    }

    $_SESSION['expedition'] = [
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone']
    ];

    require './src/View/commande/recapCommande.php';
}

function commandeComplete() {
    $pdo = (new Database())->getPdo();
    $commandeModel = new CommandeModel($pdo);

    if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
        echo "Votre panier est vide.";
        exit;
    }

    $numeroCommande = uniqid('CMD_');
    $totalCommande = array_sum(array_map(function ($produit) {
        return $produit['prix'] * $produit['quantite'];
    }, $_SESSION['panier']));

    $idUser = null;
    $idCommande = $commandeModel->createOrder($idUser, $totalCommande);

    foreach ($_SESSION['panier'] as $idProduit => $produit) {
        $commandeModel->addOrderDetails($idCommande, $idProduit, $produit['quantite'], $produit['prix']);
        $commandeModel->setProductQuantity($idProduit, $produit['quantite']);
    }

    $_SESSION['numeroCommande'] = $numeroCommande;

    header('Location: index.php?page=commandeComplete');
    // unset($_SESSION['panier']);
    exit();
}

function afficherConfirmationCommande() {
    if (!isset($_SESSION['numeroCommande'])) {
        echo "Erreur : Aucun numéro de commande trouvé.";
        exit();
    }

    $numeroCommande = $_SESSION['numeroCommande'];
    $infosExpedition = $_SESSION['expedition'] ?? null;
    $panier = $_SESSION['panier'] ?? [];

    $totalCommande = array_sum(array_map(function ($produit) {
        return $produit['prix'] * $produit['quantite'];
    }, $panier));

    unset($_SESSION['panier']);

    $data = [
        'numeroCommande' => $numeroCommande,
        'infosExpedition' => $infosExpedition,
        'panier' => $panier,
        'totalCommande' => $totalCommande
    ];

    require './src/View/commande/commandeComplete.php';
}

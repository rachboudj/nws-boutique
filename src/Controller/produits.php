<?php

require_once './src/Model/produits.php';
require_once './src/utils/functions.php';

function affichProduits()
{
    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    $produits = $model->showProducts();


    require './src/View/produits/produits.php';
}

function ajoutProduits()
{

    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);
    $errors = array();

    if (!empty($_POST['submit'])) {
        $nom = trim(strip_tags($_POST['nom']));
        $description = trim(strip_tags($_POST['description']));
        $image = trim(strip_tags($_POST['image']));
        $quantite = trim($_POST['quantite']);
        $prix = trim($_POST['prix']);

        $errors = validationTexte($errors, $nom, 'nom', 3, 100);
        $errors = validationTexte($errors, $description, 'description', 3, 1000);
        $errors = validationTexte($errors, $quantite, 'quantite', 1, 1000);
        $errors = validationTexte($errors, $prix, 'prix', 1, 1000);

        if (count($errors) === 0) {
            $model->addProducts($nom, $description, $image, $quantite, $prix);
            echo "Le produit a été enregistré avec succès !";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement du produit... Veuillez réessayer.";
        }
    }

    require './src/View/produits/ajoutProduits.php';
}


function modifProduits()
{


    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    $errors = array();

    if (!empty($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $id = $_GET['produitId'];

        $produits = $model->getDetailsProduit($id);

        if (!empty($_POST['submit'])) {
            $nom = trim(strip_tags($_POST['nom']));
            $description = trim(strip_tags($_POST['description']));
            $image = trim(strip_tags($_POST['image']));
            $quantite = trim($_POST['quantite']);
            $prix = trim($_POST['prix']);

            $errors = validationTexte($errors, $nom, 'nom', 3, 100);
            $errors = validationTexte($errors, $description, 'description', 3, 1000);
            $errors = validationTexte($errors, $prix, 'prix', 1, 1000);

            if (count($errors) === 0) {
                $model->editProducts($nom, $description, $image, $prix, $quantite, $id);
                header('Location: index.php?page=produits');
            }
        }
    }


    require './src/View/produits/modifProduits.php';
}

function supprProduits()
{
    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    if (!empty($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $id = $_GET['produitId'];
        $model->deleteProducts($id);
        header('Location: index.php?page=produits');
        exit();
    }
}

function detailsProduits()
{
    $pdo = (new Database())->getPdo();
    $model = new ProduitsModel($pdo);

    if (!empty($_GET['produitId']) && ctype_digit($_GET['produitId'])) {
        $id = $_GET['produitId'];
        $produits = $model->getDetailsProduit($id);
    }


    require './src/View/produits/detailsProduits.php';
}
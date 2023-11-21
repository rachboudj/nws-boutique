<?php 

require_once './src/Model/inscription.php';
require_once './src/utils/functions.php';

function inscription() {

    $pdo = (new Database())->getPdo();
    $model = new InscriptionModel($pdo);
    $errors = array();

    if (!empty($_POST['submit'])) {
        $nom = trim(strip_tags($_POST['nom']));
        $mdp = trim(strip_tags($_POST['mdp']));
        $email = trim(strip_tags($_POST['email']));
        $telephone = trim(strip_tags($_POST['telephone']));
        $adresse = trim(strip_tags($_POST['adresse']));

        $errors = validationTexte($errors, $nom, 'nom', 3, 100);
        $errors = validationTexte($errors, $mdp, 'mdp', 3, 100);
        $errors = validationTexte($errors, $email, 'email', 3, 150);
        $errors = validationTexte($errors, $adresse, 'adresse', 10, 100);
        $errors = validationTexte($errors, $telephone, 'telephone', 10, 15);
    
        if (count($errors) === 0) {
            $model->addUser($nom, $email, $adresse, $mdp, $telephone);
            echo "User inscrit let's goooo !";
        } 
    }

    require './src/View/inscription.php';
}

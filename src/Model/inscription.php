<?php

class InscriptionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addUser($nom, $email, $adresse, $mdp, $telephone) {
        $password = password_hash($mdp, PASSWORD_DEFAULT);
        $requeteInscription = "INSERT INTO utilisateurs(nom, email, mdp, adresse, telephone) VALUES (:nom, :email, :mdp, :adresse, :telephone)";
        $query = $this->pdo->prepare($requeteInscription);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':mdp', $password, PDO::PARAM_STR);
        $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);

        $query->execute();
    }
}
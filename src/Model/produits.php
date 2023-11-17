<?php

class ProduitsModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addProducts($nom, $description, $image, $prix, $quantite) {
        $requeteProduits = "INSERT INTO produits(nom, description, image, prix, quantite) VALUES (:nom, :description, :image, :prix, :quantite)";
        $query = $this->pdo->prepare($requeteProduits);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_STR);

        $query->execute();
    }

}
<?php

class ProduitsModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addProducts($nom, $description, $image, $prix, $quantite)
    {
        $requeteProduits = "INSERT INTO produits(nom, description, image, prix, quantite) VALUES (:nom, :description, :image, :prix, :quantite)";
        $query = $this->pdo->prepare($requeteProduits);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);

        $query->execute();
    }

    public function showProducts()
    {
        $requeteAffichage = "SELECT * FROM produits ORDER BY id_produit DESC";
        $query = $this->pdo->prepare($requeteAffichage);
        $query->execute();
        return $query->fetchAll();
    }

    public function showEditProducts($id)
    {
        $requeteAffichage = "SELECT * FROM produits WHERE id_produit = :id_produit";
        $query = $this->pdo->prepare($requeteAffichage);
        $query->bindValue(':id_produit', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function editProducts($nom, $description, $image, $prix, $quantite, $id)
    {
        $requeteModif = "UPDATE produits SET nom= :nom, description= :description, image= :image, prix= :prix, quantite= :quantite WHERE id_produit = :id_produit";
        $query = $this->pdo->prepare($requeteModif);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_STR);
        $query->bindValue(':id_produit', $id, PDO::PARAM_INT);
        $query->execute();
    }

    function deleteProducts($id)
    {
            $requeteSuppr = "DELETE FROM produits WHERE id_produit = :id_produit";
            $query = $this->pdo->prepare($requeteSuppr);
            $query->bindValue(':id_produit', $id, PDO::PARAM_INT);
            $query->execute();
    }
}

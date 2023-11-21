<?php

class CommandeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createOrder($idUser, $total) {
        $stmt = $this->pdo->prepare("INSERT INTO commandes (id_user, date_commande, statut, total) VALUES (:id_user, NOW(), 'En attente', :total)");
        $stmt->execute([
            ':id_user' => $idUser,
            ':total'   => $total
        ]);
        return $this->pdo->lastInsertId();
    }

    public function addOrderDetails($idCommande, $idProduit, $quantite, $prix) {
        $stmt = $this->pdo->prepare("INSERT INTO details_de_commande (id_commande, id_produit, quantite, prix) VALUES (:id_commande, :id_produit, :quantite, :prix)");
        $stmt->execute([
            ':id_commande' => $idCommande,
            ':id_produit'  => $idProduit,
            ':quantite'    => $quantite,
            ':prix'        => $prix
        ]);
    }

    public function setProductQuantity($idProduit, $quantite) {
        $stmt = $this->pdo->prepare("UPDATE produits SET quantite = quantite - :quantite WHERE id_produit = :id_produit");
        $stmt->execute([
            ':quantite'   => $quantite,
            ':id_produit' => $idProduit
        ]);
    }
}

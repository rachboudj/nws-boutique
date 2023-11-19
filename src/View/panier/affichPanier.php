<?php $title = "Panier"; ?>

<?php ob_start(); ?>

<h1>Votre Panier</h1>

<?php if (empty($_SESSION['panier'])): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalGeneral = 0; ?>
            <?php foreach ($_SESSION['panier'] as $idProduit => $produit): ?>
                <?php 
                $totalProduit = $produit['prix'] * $produit['quantite'];
                $totalGeneral += $totalProduit;
                ?>
                <tr>
                    <td><?= $produit['nom'] ?></td>
                    <td><?= $produit['prix'] ?> €</td>
                    <td><?= $produit['quantite'] ?></td>
                    <td><?= $totalProduit ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total général :</th>
                <th><?= $totalGeneral ?> €</th>
            </tr>
        </tfoot>
    </table>
    <button><a href="#">Valider le panier</a></button>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>

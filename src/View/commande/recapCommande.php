<?php $title = "Récapitulatif de la Commande"; ?>

<?php ob_start(); ?>

<h1>Récapitulatif de Votre Commande</h1>

<h2>Informations d'Expédition</h2>
    <p>Nom : <?= $_SESSION['expedition']['nom'] ?></p>
    <p><strong>Adresse :</strong> <?= $_SESSION['expedition']['adresse'] ?></p>
    <p><strong>Téléphone :</strong> <?= $_SESSION['expedition']['telephone'] ?></p>

<h2>Articles Commandés</h2>
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
                    <td><?= htmlspecialchars($produit['nom']) ?></td>
                    <td><?= htmlspecialchars($produit['prix']) ?> €</td>
                    <td><?= $produit['quantite'] ?></td>
                    <td><?= htmlspecialchars($totalProduit) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total général :</th>
                <th><?= htmlspecialchars($totalGeneral) ?> €</th>
            </tr>
        </tfoot>
    </table>
    <form action="index.php?page=commandeComplete" method="post">
        <button type="submit">Finaliser la Commande</button>
    </form>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
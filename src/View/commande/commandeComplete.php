<?php $title = "Commande Complète"; ?>

<?php ob_start(); ?>

<h1>Confirmation de Votre Commande</h1>
<p>Merci pour votre achat ! Votre commande numéro <?= htmlspecialchars($data['numeroCommande']) ?> a été traitée avec succès.</p>

<h2>Informations d'Expédition</h2>
<p>
    Nom: <?= htmlspecialchars($data['infosExpedition']['nom']) ?><br>
    Adresse: <?= htmlspecialchars($data['infosExpedition']['adresse']) ?><br>
    Téléphone: <?= htmlspecialchars($data['infosExpedition']['telephone']) ?>
</p>

<h2>Récapitulatif de la Commande</h2>
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
        <?php foreach ($data['panier'] as $idProduit => $produit): ?>
            <tr>
                <td><?= htmlspecialchars($produit['nom']) ?></td>
                <td><?= htmlspecialchars($produit['prix']) ?> €</td>
                <td><?= htmlspecialchars($produit['quantite']) ?></td>
                <td><?= htmlspecialchars($produit['prix'] * $produit['quantite']) ?> €</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p>Total de la Commande: <?= htmlspecialchars($data['totalCommande']) ?> €</p>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>

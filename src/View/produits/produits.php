<?php $title = "Les produits"; ?>

<?php ob_start(); ?>

<div class="container-table">
    <h1>Nos produits</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Mis en avant</th>
                <th>Catégorie</th>
                <th colspan="3">Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit) { ?>
                <tr>
                    <td><?= $produit['id_produit']; ?></td>
                    <td><?= $produit['nom']; ?></td>
                    <td><?= $produit['description']; ?></td>
                    <td><img src="<?= $produit['image']; ?>" alt="<?= $produit['nom']; ?>"></td>
                    <td><?= $produit['prix']; ?> €</td>
                    <td><?= $produit['quantite']; ?></td>
                    <td><?= $produit['misEnAvant']; ?></td>
                    <td><?= $produit['id_categorie']; ?></td>
                    <td><a href="index.php?page=modifProduits&amp;produitId=<?= $produit['id_produit'] ?>">Modifier</a></td>
                    <td><a href="index.php?page=supprProduits&amp;produitId=<?= $produit['id_produit'] ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
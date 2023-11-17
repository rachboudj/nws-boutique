<?php $title = "Les produits"; ?>

<?php ob_start(); ?>
<h1>Nos produits</h1>

<?php
echo $produits;
?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
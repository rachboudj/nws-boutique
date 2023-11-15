<?php $title = "Accueil de NWS Boutique"; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur NWS Boutique !</h1>

<?php
echo $accueil;
?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
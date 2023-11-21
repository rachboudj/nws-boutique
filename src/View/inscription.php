<?php $title = "S'inscrire"; ?>

<?php ob_start(); ?>

<h1>Inscription</h1>
<form method="POST" action="index.php?page=inscription">
    <label for="nom">Nom</label>
    <input type="text" name="nom" />
    <span class="error"><?php if (!empty($errors['nom'])) {
                            echo $errors['nom'];
                        } ?></span>

    <label for="email">Email</label>
    <input type="email" name="email" />
    <span class="error"><?php if (!empty($errors['email'])) {
                            echo $errors['email'];
                        } ?></span>

    <label for="mdp">Mots de passe</label>
    <input type="password" name="mdp" />
    <span class="error"><?php if (!empty($errors['mdp'])) {
                            echo $errors['mdp'];
                        } ?></span>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" />
    <span class="error"><?php if (!empty($errors['adresse'])) {
                            echo $errors['adresse'];
                        } ?></span>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" />
    <span class="error"><?php if (!empty($errors['telephone'])) {
                            echo $errors['telephone'];
                        } ?></span>

    <input class="buttons" type="submit" name="submit" value="S'inscrire" />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./src/View/layout.php'); ?>
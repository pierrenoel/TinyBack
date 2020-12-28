<?php $protected = true; ?>
<?php $title = 'Dashboard'; ?>

<h6>Bienvenue à toi <?php echo $_SESSION['email'];?></h6>
<a href="/logout">Se déconnecter</a>
<a href="/user/create">Ajouter un utilisateur</a>
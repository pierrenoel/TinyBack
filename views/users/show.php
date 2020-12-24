<?php $title = 'Show an user';?>

<h2>Afficher un user en particulier</h2>

<?php echo $user['email']; ?>

<?php $id = $user['id']; ?>

<a href="/user/edit/<?php echo $user['id']; ?>">Editer</a>


<?php $title = 'Home';?>

<h1>Welcome</h1>


<?php
  foreach($users as $user)
  {
      ?><p><a href="/user/show/<?php echo $user['id']; ?>"><?php echo $user['pseudo'] ?></a></p><?php
  }
?>

<a href="/user/create">Nouvel utilisateur</a>
<a href="/messages">Afficher tous les messages</a>

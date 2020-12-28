<?php $title = 'Home';?>

<h1>Welcome</h1>

<?php echo $_SESSION['email'];?>

<?php
  foreach($users as $user)
  {
      ?><p><a href="/user/show/<?php echo $user['id']; ?>"><?php echo $user['pseudo'] ?></a></p><?php
  }
?>
<a href="/messages">Afficher tous les messages</a>
<a href="/dashboard">Mon dashboard</a>

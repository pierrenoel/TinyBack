<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>

    <h1>Welcome</h1>
    <?php
      foreach($users as $user)
      {
          ?><p><a href="/user/<?php echo $user['id']; ?>"><?php echo $user['pseudo'] ?></a></p><?php
      }
    ?>

</body>
</html>
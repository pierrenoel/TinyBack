<?php $title = 'Editer un user';?>

<form method="POST" action="#">
    <div class="form-group">
        <input type="text" class="form-control" name="pseudo" value="<?php echo $user['pseudo']?>">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?php echo $user['email']?>">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" value="<?php echo $user['password']?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Modifier" class="btn btn-primary">
    </div>
</form>
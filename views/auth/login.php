<?php $title="Login";?>

<h2>Se connecter</h2>

<?php echo $_SESSION['email']; ?>


<form method="POST" action="/login">
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Votre email">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
    </div>
    <div class="form-group">
        <input type="submit" value="Se connecter" class="btn btn-primary">
    </div>
</form>
<?php $title = "Create a new user";?>

<h2>New user!</h2>

<form action="/user/create" method="POST">
    <div class="form-group">
        <input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Create" class="btn btn-success">
    </div>
</form>

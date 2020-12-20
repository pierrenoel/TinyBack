# TinyBack

Before doing anything, remind no using this "little framework" for real projects. The project is 
still in production. 

## Tiny
You can create models and controller with Tiny.

```
php tiny help
php tiny controller HomeController
php tiny model User
```

- When you create a new controller using the tiny command, it creates the controller in the right directory,
it is the same for the models.

## Set up the application
- Configure [to improve] your database in `config.php`
- Create your routes [to improve] `routes/web.php`

## Request a table from the database
- Create a new Model file and import it in the controller
```php
use app\models\User;
User::all(); // Returns an array
```

## Return a view with the data
```php
use app\models\User;
use app\core\View;

$users = User::all()
View::create('user.index','users',$users);
```
Three params:
- The view
- For the foreach
- The result of the `User::all()`

## Example (all)
```php
// Controler HomeCOntroller

use app\models\User;
use app\core\View;

public function index()
{
    $users = User::all()
    View::create('user.index','users',$users);  
}
```

```php
<?php
    foreach($users as $user)
    {
        echo $user['email'];
    }
?>
```

## Example (show)
```php
public function show($id)
{
    $user = User::find($id);
    View::create('show','user',$user);
}
```

## Example (create)
```php
public function store()
{
    Validation::check([
        $_POST['pseudo'] => 'text',
        $_POST['email'] => 'email',
        $_POST['password'] => 'text'
    ]);

    User::create([
        'pseudo' => $_POST['pseudo'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);
    
    View::redirect('/');
}
```

## To do 
- [ ] Finish the CRUD
- [ ] Implement templating
- [ ] Implement a better router
- [ ] POST & GET requests
- [ ] Improve the Model class, cause it sucks!
- [ ] A singleton for the database
- [ ] Validation
- [ ] Auth & sessions
- [ ] Create the documentation
- [ ] Implement a cli php
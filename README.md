# TinyBack

Before doing anything, remind no using this "little framework" for real projects. The project is 
still in production. 

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

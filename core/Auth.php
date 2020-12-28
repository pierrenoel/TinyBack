<?php

namespace app\core;
use PDO;
require_once __DIR__ . '/../config.php';

class Auth
{
    // Create the session
    // Place all the data from user in a session

    protected static object $pdo;
    protected static array $data;

    public static function getConnexion()
    {
        try{
            self::$pdo = new PDO('mysql:host=localhost;dbname=chat;charset=utf8','root','root');
        }
        catch(PDOException $e)
        {
            die('Erreur: ' .$e->getMessage());
        }
        return self::$pdo;
    }

    public static function login(array $array)
    {
        self::$data = $array;

        $statement = self::getConnexion()->prepare("SELECT * FROM user WHERE email = :email && password = :password");

        $statement->bindParam(':email', $array['email'], PDO::PARAM_STR);
        $statement->bindParam(':password', $array['password'], PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();

    }

    public static function logout()
    {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public static function startSession()
    {
        $email = self::$data['email'];
        $password = self::$data['password'];

        session_start();
        $_SESSION['connected'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    }

}
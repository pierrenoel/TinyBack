<?php


namespace app\core;
use PDO;

require_once __DIR__.'/../config.php';

class Model
{
    protected static string $class;
    protected static object $pdo;

    protected static function getDatabase()
    {
        try
        {
            self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASSWORD);
        }

        catch(\Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        return self::$pdo;
    }

    protected static function getCalledlass()
    {
        self::$class = get_called_class();
        return substr(self::$class, 11);
    }

    public static function all()
    {
        $data = self::getDatabase();
        $table = lcfirst(self::getCalledlass());

        return $data->query('SELECT * FROM '.$table)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $data = self::getDatabase();
        $table = lcfirst(self::getCalledlass());

        return $data->query("SELECT * FROM $table WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

    }

    public static function create()
    {

    }

    public static function update(array $data)
    {
        self::getCalledlass();

        foreach($data as $key => $value)
        {
            // Traitement pour la database
        }
    }
}
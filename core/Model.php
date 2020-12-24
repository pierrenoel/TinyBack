<?php


namespace app\core;
use PDO;

require_once __DIR__ . '/../config.php';

class Model
{
    protected static string $class;
    protected static object $pdo;

    /*
     * Get the connexion PDO
     * @return object
     */
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

    /*
     * This function allows you to know the name of the class that depends on this class itself.
     * @return string
     */
    protected static function getCalledlass()
    {
        /*
         * calling itself and stock the name of the class in a static variable
         * it returns the complete namespace
         */
        self::$class = get_called_class();

        /*
         * Cut the namespace to get the the name of the model.
         */
        $model = substr(self::$class, 11);

        /*
         * Get the first letter in uppercase
         */
        return lcfirst($model);
    }

    /*
     * Get all the data from a table
     * @return array
     */
    public static function all()
    {
        /*
         * Call the database
         */
        $data = self::getDatabase();

        /*
         * Call the right table
         */
        $table = self::getCalledlass();

        /*
         * Returns all the data from this table
         */
        return $data->query('SELECT * FROM '.$table)->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    * Get all the data from an id
     * @param int $id
     * @return array
    */
    public static function find( int $id)
    {
        /*
          * Call the database
          */
        $data = self::getDatabase();

        /*
         * Call the right table
         */
        $table = self::getCalledlass();

        return $data->query("SELECT * FROM $table WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    /*
     * Insert into the database
     * @param array $array
     * @return mixed
     */
    public static function create(array $array)
    {
        /*
         * Call the database
         */
        $data = self::getDatabase();

        /*
         * Call the right table
         */
        $table = self::getCalledlass();

        $sql = 'INSERT INTO ' . $table . ' ';
        $columns = '(';
        $values = '(';

        foreach($array as $k => $v)
        {
            $columns .= '`' . $k . '`, ';
            $values .= "'" . $v . "', ";
        }

        $columns = rtrim($columns, ', ') . ')';
        $values = rtrim($values, ', ') . ')';
        $sql .= $columns . ' VALUES ' . $values;
        $q = $data->prepare($sql);
        $q->execute();
    }

    /*
     * Update all the data from a id
     * @param int $id, array $array
     * @return mixed
     */
    public static function update(int $id,array $array)
    {
        /*
         * Call the database
         */
        $data = self::getDatabase();

        /*
         * Call the right table
         */
        $table = self::getCalledlass();
    }

}
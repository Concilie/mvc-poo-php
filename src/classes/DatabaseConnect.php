<?php 
namespace src\classes;

use PDO;
use PDOException;

class DatabaseConnect extends PDO
{
    private static $instance = null;
    private $connect;

    //constante de connexion
    private const HOSTNAME = '';
    private const DBNAME = '';
    private const DBUSER = '';
    private const DBPASSWORD = '';

    //constucteur privée pour empecher la création d'objet
    private function __construct()
    {
        try {
            $bdd = new PDO('mysql:host='.self::HOSTNAME.';dbname='.self::DBNAME , self::DBUSER, self::DBPASSWORD);
            $bdd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connect = $bdd;
        } catch (PDOException $e) {
            print 'Error!: ' .$e->getMessage(). '<br />';
            die();
        }
    }

    //creer l'unique instance de la classe si elle n'exite pas puis la retourne
    public static function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new DatabaseConnect();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connect;
    }

   



}
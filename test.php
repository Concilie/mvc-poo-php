<?php
require 'vendor/autoload.php';
require '_config/db.php';

/*
spl_autoload_register(function ($classname) {

    include 'src/classes/' . $classname . '.php';

});
*/

use src\classes\Article;
use src\classes\User;


$ouser = new User();
$res = $ouser->afficheNom("Karine");

$oarticle = new Article();
$response = $oarticle->afficheNomArticle("Article");


echo $res;

?>
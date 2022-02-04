<?php 
try {
    //connexion à la base de donnée 
    //           dsn                nombase           username,password
    $db = new PDO( 'mysql:host=localhost;dbname=crud','root','' );
    // php data object c'est un objet y'en a plusieurs 
    //        statement:
    $db->exec( 'SET NAMES "UTF8"');
} catch ( PDOException $e){
    echo 'Erreur : '.$e->getMessage();
    die();
}
?>
<?php

class model 
{
private function connect(){
        try {
        //connexion à la base de donnée 
        //           dsn                nombase           username,password
        $db = new PDO( 'mysql:host=localhost;dbname=crud','root','' );
        // php data object c'est un objet y'en a plusieurs 
        //        statement:
        $db->exec( 'SET NAMES "UTF8"');
        // on ajoute ça 
        return $db;
        
        } catch ( PDOException $e){
        echo 'Erreur : '.$e->getMessage();
        die();
        }   
}
public function view(){

        session_start();
        // on inclut la connexion à la base 
        // on remplace comme ceci
        $db = $this->connect();
        $sql = 'select * from `produits`';
        // on prépare la requête 
        $query = $db->prepare($sql);
        // on exécute la requête
        $query->execute();
        //on stocke le résultat dans un tableau associatif
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // on remplace le require_once('close.php');par 
        $db = $this->close();
}
private function close()   
    {
        return null;
    }
}
<?php

class Model
{
    private int $id_produits = 0;
    private string $produit = "";
    private float $prix_produits = 0;
    private int $nombre_produits = 0;

    public function setId_produits(int $id_produits)
    {
        $this->id_produits = $id_produits;
    }
    public function getId_produits()
    {
        return $this->id_produits;
    }

    public function setProduit(string $produit)
    {
        $this->produit = $produit;
    }
    public function getProduit()
    {
        return $this->produit;
    }

    public function setPrix_produits(float $prix_produits)
    {
        $this->prix_produits = $prix_produits;
    }
    public function getPrix_produits()
    {
        return $this->prix_produits;
    }

    public function setNombre_produits(int $nombre_produits)
    {
        $this->nombre_produits = $nombre_produits;
    }
    public function getNombre_produits()
    {
        return $this->nombre_produits;
    }

    private function connect()
    {
        try {
            //connexion à la base de donnée 
            //           dsn                nombase           username,password
            $db = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
            // php data object c'est un objet y'en a plusieurs 
            //        statement:
            $db->exec('SET NAMES "UTF8"');
            // on ajoute ça 
            return $db;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
    public function view()
    {

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
        return $result = $query->fetchAll(PDO::FETCH_ASSOC);
        //on a supprimé la fonction close() car du moment qu'on sort de la fonction
        //toutes les variables disparaissent y compris $db = $this->close();
        //ça se fait automatiquement on a pas besoin de l'écrire 

    }
    public function add()
    {
        session_start();
        // c'est des données stockées sur le navigateur (qui nous permettent de surfer plusieurs page sans nous reconnecter ) que je peux récupérer d'une page à l'autre 
        // on inclut la connexion à la base 


        $db = $this->connect();

        $produit = $this->produit;

        $prix_produits = $this->prix_produits;

        $nombre_produits = $this->nombre_produits;

        $sql = 'INSERT INTO `produits` (`produit`, `prix_produits`, `nombre_produits`) VALUES (:produit, :prix_produits, :nombre_produits );';

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix_produits',$prix_produits, PDO::PARAM_STR);
        $query->bindValue(':nombre_produits', $nombre_produits, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "produit ajouté";

        header('location: index.php');
    }

    public function update(){

        session_start();

        $db = $this->connect();

        $id = $this->id_produits;

        $produit = $this->produit;

        $prix_produits = $this->prix_produits;

        $nombre_produits = $this->nombre_produits;

        $sql = 'UPDATE `produits` SET `produit` = :produit,`prix_produits` = :prix_produits,`nombre_produits` = :nombre_produits
            WHERE  `id_produits`= :id;';


        $query = $db->prepare($sql);
        
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix_produits',$prix_produits, PDO::PARAM_STR);
        $query->bindValue(':nombre_produits', $nombre_produits, PDO::PARAM_INT);

        $query->execute();
        $_SESSION['message'] = "produit ajouté";

        header('location: index.php');

    }

    public function getOneligne(){
        session_start();

        $db = $this->connect();

        $id = $this->id_produits;
        $sql = 'SELECT * FROM `produits` WHERE `id_produits`= :id;';
        $query = $db->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        return $result = $query->fetch(PDO::FETCH_ASSOC);
        // require_once('close.php');
    }

    public function delete(){
        session_start();
        $db = $this->connect();
        $id = $this->id_produits;
        $sql = "DELETE FROM `produits` WHERE `id_produits`=:id;";

        $query = $db->prepare($sql);
    
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        header('location: index.php');
    }
}

?>
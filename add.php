<?php 
// on démarre une session 
session_start();
// c'est des données stockées sur le navigateur (qui nous permettent de surfer plusieurs page sans nous reconnecter ) que je peux récupérer d'une page à l'autre 
// on inclut la connexion à la base 
if($_POST){
    if(isset($_POST['produit']) && !empty($_POST['produit']) &&
       isset($_POST['prix_produits']) && !empty($_POST['prix_produits']) &&
       isset($_POST['nombre_produits']) && !empty($_POST['nombre_produits']))
    
    { 
        require_once('connect.php');
        //on nettoie les données envoyées 
        $produit = strip_tags($_POST['produit']);
        $prix_produits = strip_tags($_POST['prix_produits']);
        $nombre_produits = strip_tags($_POST['nombre_produits']);
        //var_dump($_POST);die();
        $sql = 'INSERT INTO `produits` (`produit`, `prix_produits`, `nombre_produits`) VALUES (:produit, :prix_produits, :nombre_produits )';
        // on prépare la requête 
        $query = $db->prepare($sql);
        //attribuer la valeur 
        $query->bindValue(':produit' ,$produit,PDO::PARAM_STR);
        $query->bindValue(':prix_produits' ,$prix_produits,PDO::PARAM_STR);
        $query->bindValue(':nombre_produits' ,$nombre_produits,PDO::PARAM_INT);
        // on exécute la requête
        $query->execute();
        $_SESSION['message'] = "produit ajouté";
        require_once('close.php');
        header('location: index.php');
        

    }
    else{
        $_SESSION['erreur'] = "erreur lors du chargement du fichier ";
        }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    <?php 
        if(!empty($_SESSION['erreur'])){
            echo    '<div> 
                        '.$_SESSION['erreur'].'
                    </div>';
            $_SESSION['erreur'] = "";
        }
    ?>
    <h1>ajouter un produit</h1>
    <form  method="post">
        <input type="text" id="produit" name="produit" placeholder = "produit"/> <br>
        <input type="number" id="prix_produits" name="prix_produits" placeholder = "prix_produits"/> <br>
        <input type="number" id="nombre_produits" name="nombre_produits" placeholder = "nombre_produits"/>
        <button type="submit">envoyer</button>
    </form>
   
    
</body>
</html>
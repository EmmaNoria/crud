<?php 
// on démarre une session 
session_start();
// c'est des données stockées sur le navigateur (qui nous permettent de surfer plusieurs page 
//sans nous reconnecter ) que je peux récupérer d'une page à l'autre
require_once('connect.php');

if(isset($_POST)){
      
    if(isset($_GET['id'])&& !empty($_GET['id']) &&
        isset($_POST['produit']) && !empty($_POST['produit']) &&
        isset($_POST['prix_produits']) && !empty($_POST['prix_produits']) &&
        isset($_POST['nombre_produits']) && !empty($_POST['nombre_produits'])){ 

            $id = strip_tags($_GET['id']);
            $produit = strip_tags($_POST['produit']);
            $prix_produits = strip_tags($_POST['prix_produits']);
            $nombre_produits = strip_tags($_POST['nombre_produits']);

            $sql = 'UPDATE `produits` SET `produit` = :produit,`prix_produits` = :prix_produits,`nombre_produits` = :nombre_produits
            WHERE  `id_produits`= :id;';

            $query = $db->prepare($sql);

            $query->bindValue(':id',$id, PDO::PARAM_INT);
            $query->bindValue(':produit' ,$produit,PDO::PARAM_STR);
            $query->bindValue(':prix_produits' ,$prix_produits,PDO::PARAM_STR);
            $query->bindValue(':nombre_produits' ,$nombre_produits,PDO::PARAM_INT);

            $query->execute();
            header('location: index.php');
        }
    

}

if($_GET){
    if(isset($_GET['id'])){

        //on nettoie les données envoyées 
        $id = strip_tags($_GET['id']);
        $sql = 'SELECT * FROM `produits` WHERE `id_produits`= :id;';
        $query = $db->prepare($sql);
        //attribuer la valeur 
        // on accroche les paramètres "id "
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        /*$query->bindValue(':produit',$produit,PDO::PARAM_STR);
        $query->bindValue(':prix_produits',$prix_produits,PDO::PARAM_STR);
        $query->bindValue(':nombre_produits',$nombre_produits,PDO::PARAM_INT);*/

        // on exécute la requête
        $query->execute();
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
        require_once('close.php');
    }
    // else{
    //     $_SESSION['erreur'] = "le formulaire n'est pas complet!";
    // }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    <h1>modifier un produit</h1>
    <form  method="post">
        <input type="text" id="produit" name="produit" value="<?= $result['produit']?>"> <br>
        <input type="number" id="prix_produits" name="prix_produits" value="<?= $result['prix_produits']?>"> <br>
        <input type="number" id="nombre_produits" name="nombre_produits" value="<?= $result['nombre_produits']?>"> <br>
        <button type="submit">modifier</button>
    </form>
   
    
</body>
</html>
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
        <input type="text" id="prix_produits" name="prix_produits" placeholder = "prix_produits"/> <br>
        <input type="number" id="nombre_produits" name="nombre_produits" placeholder = "nombre_produits"/>
        <button type="submit">envoyer</button>
    </form>
   
    
</body>
</html>
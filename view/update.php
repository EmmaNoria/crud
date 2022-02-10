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
<?php 

echo    '<div> 
'.$_SESSION['message'].'
</div>';
$_SESSION['message'] = "";

?>
<link rel="stylesheet" href="style.css">
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>produits</th>
            <th>prix_produits</th>
            <th>nombre_produits</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        //on boucle sur la variable result
        foreach($result as $produit){
            ?>

            <tr>
                <td><?= $produit['id_produits']?></td>
                <td><?= $produit['produit']?></td>
                <td><?= $produit['prix_produits']?></td>
                <td><?= $produit['nombre_produits']?></td>
                <td><a href="update.php?id=<?= $produit['id_produits']?>">modifier</a></td>
                <td><a href="delete.php?id=<?= $produit['id_produits']?>">supprimer</a></td>
            </tr>
            <?php
        }
        ?>
   
      
    </tbody>
</table>
                                
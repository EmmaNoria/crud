<?php
require("./model/model.php");

function viewProducts() {
    $model= new Model();
    $result= $model->view();
    require("./view/list.php");
}
function addProduct(){
    if($_POST){ 
        if (isset($_POST['produit']) && isset($_POST['prix_produits']) && !empty($_POST['prix_produits']) && isset($_POST['nombre_produits']))
        { 
            $model= new Model();
            $model->setProduit(strip_tags($_POST['produit']));
            $model->setPrix_produits(strip_tags($_POST['prix_produits']));
            $model->setNombre_produits(strip_tags($_POST['nombre_produits']));
            $model->add();
        } else{
            $_SESSION['erreur'] = "erreur lors du chargement du fichier ";
        }
    }
    require("./view/add.php");
}
    
        
    
      

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
function updateProduct(){
    if(isset($_POST)){
      
        if(isset($_GET['id'])&& !empty($_GET['id']) &&
            isset($_POST['produit']) && !empty($_POST['produit']) &&
            isset($_POST['prix_produits']) && !empty($_POST['prix_produits']) &&
            isset($_POST['nombre_produits']) && !empty($_POST['nombre_produits']))
            {
                $model = new Model();
                $model->setId_produits(strip_tags($_GET['id']));
                $model->setProduit(strip_tags($_POST['produit']));
                $model->setPrix_produits(strip_tags($_POST['prix_produits']));
                $model->setNombre_produits(strip_tags($_POST['nombre_produits']));
                $model->update();

            }
            
    }
    if($_GET){
        if(isset($_GET['id'])){

            $id = strip_tags($_GET['id']);
            $model= new Model();
            $model->setId_produits($id); 

            $result = $model->getOneligne();
        }
        
    }
    require("./view/update.php");
}


?>
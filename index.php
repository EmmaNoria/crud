<?php
require("./controller/controller.php");

if (isset($_GET['action'])){
    if($_GET['action']=='add'){
        addProduct();
    } else if($_GET['action']=='update') {
        updateProduct();
    } else if($_GET['action']=='delete'){ 
        deleteProducts();
    }
}else{
    viewProducts();
}
?>
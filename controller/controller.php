<?php
require("./model/model.php");

function viewProducts() {
    $model= new model();
    $result= $model->view();
    require("./view/list.php");
}
<?php 
require "discount_controller.php";


if (isset($_POST['id_code'])){
    $id = $_POST['id_code']; 
} 
echo json_encode($id);

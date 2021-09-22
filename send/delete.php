<?php

require __DIR__ . "/../source/autoload.php";

$product = new \Source\Models\Product;


$getid = $_GET['idproduct'];
$idproduct = str_replace('?idproduct=', ' ', $getid);
$id = trim(base64_decode($idproduct));

usleep(400000);

$product->delete($id);

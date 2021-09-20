<?php

require __DIR__ . "/../source/autoload.php";


$product = new \Source\Models\Product;


$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = array();

usleep(400000);

if(isset($post) ?  $post : ''){

    $response = $post;

    $valueprice = new stdClass();

    $valueprice->price = strip_tags($post['price']);
    $valueprice->idproduct = $post['idproduct'];

    $response['price'] = $valueprice->price;
    $response['idproduct'] = $valueprice->idproduct;

    $price = (float)$response['price'];
    $idproduct = (int)$response['idproduct'];


    $product->updateProduct($price, $idproduct);
    var_dump($price);
    var_dump($idproduct);

    if (!empty($response)){

        $response['success'] = true;
        
        echo json_encode($response);    

    } else {

        $response["error"] = true;
        $response["errorMsg"] = "501 - Erro ao processar requisição.";
        echo json_encode($response);
        
    }

}
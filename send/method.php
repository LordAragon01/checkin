<?php

require __DIR__ . "/../source/autoload.php";


$productModel = new \Source\Models\Product;


$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$post = array_map("strip_tags", $getPost);

$response = array();

usleep(400000);

if(isset($post)){

    $response = $post;

    $list = new stdClass();
    $list->mercearia = strip_tags($post['mercearia']);
    $list->fresco = strip_tags($post['fresco']);
    $list->talho = strip_tags($post['talho']);
    $list->congelados = strip_tags($post['congelados']);
    $list->limpeza = strip_tags($post['limpeza']);
    $list->charcutaria = strip_tags($post['charcutaria']);
    $list->guloseimas = strip_tags($post['guloseimas']);
    $list->bebidas = strip_tags($post['bebidas']);

    $response['mercearia'] = $list->mercearia;
    $response['fresco'] = $list->fresco;
    $response['talho'] = $list->talho;
    $response['congelados'] = $list->congelados;
    $response['limpeza'] = $list->limpeza;
    $response['charcutaria'] = $list->charcutaria;
    $response['guloseimas'] = $list->guloseimas;
    $response['bebidas'] = $list->bebidas;

    $cat_mercearia = 1;
    $cat_fresco = 2;
    $cat_talho = 3;
    $cat_congelados = 4;
    $cat_limpeza = 5;
    $cat_charcu = 6;
    $cat_gulo = 7;
    $cat_bebidas = 8;

    $productModel->saveProduct($response['mercearia'], (int)$cat_mercearia);
    $productModel->saveProduct($response['fresco'], (int)$cat_fresco);
    $productModel->saveProduct($response['talho'], (int)$cat_talho);
    $productModel->saveProduct($response['congelados'], (int)$cat_congelados);
    $productModel->saveProduct($response['limpeza'], (int)$cat_limpeza);
    $productModel->saveProduct($response['charcutaria'], (int)$cat_charcu);
    $productModel->saveProduct($response['guloseimas'], (int)$cat_gulo);
    $productModel->saveProduct($response['bebidas'], (int)$cat_bebidas);

    if (!empty($response)){

        $response['success'] = true;
        
        echo json_encode($response);

    } else {

        $response["error"] = true;
        $response["errorMsg"] = "501 - Erro ao processar requisição.";
        echo json_encode($response);
        
    }

}


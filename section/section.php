<?php

require __DIR__ . "/../source/autoload.php";

use Source\Models\Product;

$product = new Product();



?>
       <!--Second Page--> 
        <div class="col-12" id="secondpage">

            <h1 class="text-center mb-3"> Checklist </h1>

            <div class="my-3 d-flex justify-content-end flex-row"> 

                <button type="button" class="btn btn-primary verification">Verificar</button>

            </div>


            <div class="d-flex flex-row justify-content-center"> 

              <table class="table hovertable">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Check</th>
                        <th scope="col">Ações</th>
                        <th scope="col">Data</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        

            <?php 
                //Mercearia List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $mercearialist = $product->listAll(1, $first_day_this_month, $last_day_this_month);


               foreach($mercearialist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?>  


            <?php 
                //Fresco List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $frescolist = $product->listAll(2, $first_day_this_month, $last_day_this_month);


               foreach($frescolist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?> 

            
            <?php 
                //Talho List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $talholist = $product->listAll(3, $first_day_this_month, $last_day_this_month);


               foreach($talholist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?> 
                       
              
            <?php 
                //Congelados List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $conglist = $product->listAll(4, $first_day_this_month, $last_day_this_month);


               foreach($conglist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?> 
            
               
            <?php 
                //Limpeza List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $limpezalist = $product->listAll(5, $first_day_this_month, $last_day_this_month);


               foreach($limpezalist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?> 
         
                
            <?php 
                //Charcutaria List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $charclist = $product->listAll(6, $first_day_this_month, $last_day_this_month);


               foreach($charclist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?>
            
                
            <?php 
                //Guloseimas List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $gullist = $product->listAll(7, $first_day_this_month, $last_day_this_month);


               foreach($gullist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?> 

                 
            <?php 
                //Bebidas List
                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $beblist = $product->listAll(8, $first_day_this_month, $last_day_this_month);


               foreach($beblist as $list){

                    if(!empty($list['product_name'])){

                    $className = strtolower(trim($list['category_name']));
                    //$dateFormat = date_format($list['register_at'], 'd-m-Y');
                    $getid = isset($list['list_id']) ? $list['list_id']: '' ;
                    $price = number_format($list['price'], 2, '.', ',');
                    $idcript = base64_encode($list['list_id']);

                    echo "<tr class='{$className}'>
                    <td> {$list['list_id']} </td>
                    <td>{$list['category_name']}</td>
                    <td>{$list['product_name']}</td>
                    <td class='price'>{$price} €</td>
                    <td class='rowprice'>
                        <form class='formprice' action='' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>
                                <input type='text' class='form-control price' maxlength='6' name='price' id='price' aria-label='Inform a price' placeholder='Valor do Produto'>
                                <input type='hidden' class='idproduct' name='idproduct' value='{$getid}' >
                            </div>
                                
                            <button type='submit' class='btn btn-primary submitprice' name='submitprice' aria-labelledby='Send List'>ADD</button>

                        </form>
                    </td>

                    <td> 
                        <div class='check'>
                            <p><b>√</b></p>
                        </div> 
                    </td>

                    <td> 
                        <button type='button' class='btn btn-primary update'>Update</button>
                        <a href='?idproduct={$idcript}' class='btn btn-danger delete'>Delete</a>
                    </td>
                    <td>{$list['register_at']}</td>
                    </tr>";

                    }  

               }


            ?>    

                    </tbody>
                </table>

            </div>
        
        </div>
        
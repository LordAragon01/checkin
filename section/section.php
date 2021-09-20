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

              <table class="table">
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

                $first_day_this_month = date('Y-m-01'); 
                $last_day_this_month = date('Y-m-t');
                            
               $mercearialist = $product->listAll(1, $first_day_this_month, $last_day_this_month);


               foreach($mercearialist as $list_merc){

                    if(!empty($list_merc['product_name'])){

                    $className = strtolower(trim($list_merc['category_name']));
                    //$dateFormat = date_format($list_merc['register_at'], 'd-m-Y');
                    $getid = isset($list_merc['list_id']) ? $list_merc['list_id']: '' ;
                    $price = number_format($list_merc['price'], 2, '.', ',');

                    echo "<tr class='{$className}'>
                    <td> {$list_merc['list_id']} </td>
                    <td>{$list_merc['category_name']}</td>
                    <td>{$list_merc['product_name']}</td>
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
                        <button type='button' class='btn btn-danger delete'>Delete</button>
                    </td>
                    <td>{$list_merc['register_at']}</td>
                    </tr>";

                    }  

               }


            ?>  

                               
                    </tbody>
                </table>

            </div>
        
        </div>
        
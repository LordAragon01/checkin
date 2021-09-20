<?php

namespace Source\Models;

use Source\Database\Connect;
use Source\Models\Model;

class Product extends Model{
	
		const ERROR = "ProductError";
		const SUCCESS = "ProductSucesss";
		
	public function listAll($category_id, $first, $last){
		
		$connect = new Connect();
		
		$results = $connect->select("SELECT * FROM list INNER JOIN categorys USING (category_id) WHERE register_at BETWEEN (:register_at_first) AND (:register_at_last) AND category_id = :category_id ORDER BY product_name ASC", [
			":category_id" => $category_id,
			":register_at_first" => $first,
			":register_at_last" => $last
		]);
		
		return $results;

	} 

	
	public static function checkList($list){
		
		foreach($list as &$row){
			
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();
			
		}	
		
		return $list;
	}
	
	
	public function saveProduct(string $data, int $category_id){
		
	    $connect = new Connect();
	
		$connect->query("INSERT INTO list (category_id, product_name, price) VALUES( :category_id, :product_name, :price)", array(
			":category_id" => $category_id,
			":product_name"=>$data,
			":price"=>$this->getprice()	
		));
		
		//$this->setData($results[0]);
	}

	public function updateProduct($price, $list_id){

		$connect = new Connect();

		$connect->query("UPDATE list SET price = :price WHERE list_id = :list_id", array(
			":price" => $price,
			":list_id" => $list_id
		));

	}

	
	public function get($list_id){
		
		$Connect = new Connect();
		
		$results = $Connect->select("SELECT * FROM list WHERE list_id = :list_id", [
			":list_id"=>$list_id
		
		]);
		
		$this->setData($results[0]);
	
	}
	
	public function delete(){
		
		
		$Connect = new Connect();
		$results = $Connect->query("DELETE FROM tb_products WHERE idproducts = :idproducts", [
			":idproducts"=>$this->getidproducts()
		]);	
		
	}
	

	public static function getPage($page = 1, $itemsPerPage = 10){
		
		$start = ($page - 1) * $itemsPerPage;

		$Connect = new Connect();
		
		$results = $Connect->select("
		SELECT Connect_CALC_FOUND_ROWS 
		* FROM tb_products 
		ORDER BY desnome
		LIMIT $start, $itemsPerPage;
		");
		
		$resultTotal = $Connect->select("SELECT FOUND_ROWS() AS nrtotal;");
		
		return[
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
		
	}

	
	
}
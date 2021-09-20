<?php 

namespace Source\Database;

class Connect {

	const HOSTNAME = "localhost";
	const USERNAME = "Admin";
	const PASSWORD = "Flamengo2511";
	const DBNAME = "gestao_compras";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Connect::DBNAME.";charset=utf8".";host=".Connect::HOSTNAME,
			Connect::USERNAME,
			Connect::PASSWORD
		);  

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}
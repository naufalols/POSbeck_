<?php 

class database{
	private $host 	= DB_HOST;
	private $user	= DB_USER;
	private $pass	= DB_PASS;
	private $db_name	= DB_NAME;
	private $query;
	private $dbh;
	private $stmt;

	public function __construct()
	{
		//database name
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
		if (@is_null($query)) {
			switch (true) {
				case is_int($value):
				$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
				case is_null($value):
				$type = PDO::PARAM_NULL;
				break;

				default:
				$type = PDO::PARAM_STR;
				break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}


	public function execute()
	{
		
		$this->stmt->execute();
		
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function noNota()
	{
		$this->execute();
		return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
	}


	public function hitungBarisUpdate()
	{
		return $this->stmt->rowCount();
	}


}


<?php

namespace WebDevBr\QueryBuilder;

use PDO;

class Execute
{
	private $builder;

	public function __construct(Connection $conn)
	{
		$this->conn = $conn;
	}

	public function sql(BuilderInterface $sql_builder)
	{
		$this->builder = $sql_builder->sql();
	}

	public function findAll($type = null)
	{
		$pdo = $this->conn->getConn();
		$statement = $pdo->prepare($this->builder);
		$statement->execute();

		if (empty($type)) {
			$type = PDO::FETCH_ASSOC;
		}
		return $statement->fetchAll($type);
	}
}
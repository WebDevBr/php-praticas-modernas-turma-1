<?php

namespace WebDevBr\QueryBuilder;

use PDO;

class Connection
{
	private $config;
	private $pdo;

	/**
	 * Espero que o array $config venha com os seguintes dados
	 *
	 * $config = [
	 * 	'dsn'=>'mysql:',
	 * 	'user'=>'root',
	 * 	'pass'=>'123',
	 * 	'config'=>[]
	 * ];
	 * 
	 * @param Array $config Configuração de banco de dados
	 */
	public function __construct(Configurator $config)
	{
		$this->config = $config;
	}

	public function conn()
	{
		if (empty($this->pdo)) {
			extract($this->config->getConfig());
			$this->pdo = new PDO($dsn, $user, $pass, $config);
		}
	}

	public function getConn()
	{
		return $this->pdo;
	}
}
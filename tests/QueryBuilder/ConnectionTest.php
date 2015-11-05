<?php

namespace WebDevBr\QueryBuilder;

class ConnectionTest extends \PHPUnit_Framework_TestCase
{
	public function testConexaoAoBancoDeDados()
	{
		$config = new Configurator([
		  	'dsn'=>'mysql:host=localhost;dbname=php_praticas_modernas',
		  	'user'=>'root',
		  	'pass'=>'123',
		  	'config'=>[]
		]);
		$conn = new Connection($config);
		$conn->conn();
		$pdo = $conn->getConn();

		$this->assertInstanceOf('PDO', $pdo);
	}
}
<?php

namespace WebDevBr\QueryBuilder;

class ExecuteTest extends \PHPUnit_Framework_TestCase
{
	
	public function testExecuteSelect()
	{
		$config = new Configurator([
		  	'dsn'=>'mysql:host=localhost;dbname=php_praticas_modernas',
		  	'user'=>'root',
		  	'pass'=>'123',
		  	'config'=>[]
		]);
		$conn = new Connection($config);
		$conn->conn();

		$select = new Mysql\Select;

		$execute = new Execute($conn);
		$execute->sql($select);

		$data = $execute->findAll();

		$esperado = [
			[
				'id'=>1,
				'name'=>'Erik',
				'email'=>'contato@webdevbr.com.br',
			]
		];

		$this->assertEquals($esperado, $data);
	}
}
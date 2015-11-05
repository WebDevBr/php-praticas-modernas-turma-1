<?php

namespace WebDevBr\QueryBuilder;

class QueryBuilderTest extends \PHPUnit_Framework_TestCase
{
	public function testExecutaSelect()
	{
		QueryBuilder::conn([
		  	'dsn'=>'mysql:host=localhost;dbname=php_praticas_modernas',
		  	'user'=>'root',
		  	'pass'=>'123',
		  	'config'=>[]
		]);

		$execute = QueryBuilder::getPdo();

		$select = new Mysql\Select;
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
/*
	public function testSingleton()
	{
		$query = new QueryBuilder();
	}*/
}
<?php

namespace WebDevBr\QueryBuilder\Mysql;

class Where
{
	private $fields = [];

	public function set($field, $op, $value)
	{
		$this->fields[$field] = [
			'op'=> $op,
			'value' => $value
		];
	}

	public function sql()
	{
		foreach ($this->fields as $k=>$v) {
			$sql = "`{$k}`=:{$k}";
		}
		
		return $sql;
	}
}

<?php

namespace WebDevBr\QueryBuilder\Mysql;

class Select
{
	public $table = 'users';
	private $fields = null;
	private $where = null;

	public function sql()
	{
		$fields = '*';
		if (!empty($this->fields)) {
			$fields = implode('`, `', $this->fields);
			$fields = "`{$fields}`";
		}
		return "SELECT {$fields} FROM {$this->table}{$this->where};";
	}

	public function fields(Array $fields)
	{
		$this->fields = $fields;
	}

	public function where(Where $where)
	{
		$this->where = ' WHERE '.$where->sql();
	}
}

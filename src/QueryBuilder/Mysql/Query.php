<?php

namespace WebDevBr\QueryBuilder\Mysql;

use WebDevBr\QueryBuilder\BuilderInterface;

abstract class Query implements BuilderInterface
{
    public $table = 'users';
    protected $fields = null;
    protected $where = null;

    public function fields(Array $fields)
    {
        $this->fields = $fields;
    }

    public function where(Where $where)
    {
        $this->where = ' WHERE '.$where->sql();
    }
}

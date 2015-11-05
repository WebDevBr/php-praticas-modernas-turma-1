<?php

namespace WebDevBr\QueryBuilder\Mysql;

class Select extends Query
{
    public function sql()
    {
        $fields = '*';
        if (!empty($this->fields)) {
            $fields = implode('`, `', $this->fields);
            $fields = "`{$fields}`";
        }
        return "SELECT {$fields} FROM {$this->table}{$this->where};";
    }
}

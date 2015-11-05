<?php

namespace WebDevBr\QueryBuilder\Mysql;

class Where
{
    private $fields = [];

    public function set($field, $op, $value, $condition_separator = 'and')
    {
        $this->fields[$field] = [
            'op'=> $op,
            'value' => $value,
            'condition_separator'=>$condition_separator
        ];
    }

    public function sql()
    {
        $data = [];

        foreach ($this->fields as $k => $v) {
            $data[$v['condition_separator']][] = "`{$k}`=:{$k}";
        }

        $sql = '';

        if (isset($data['and'])) {
            $sql .= implode(' and ', $data['and']);
        }

        if (isset($data['or']) and isset($data['and'])) {
            $sql .= ' and ';
        }

        if (isset($data['or'])) {
            $sql .= implode(' or ', $data['or']);
        }
        
        return $sql;
    }

    public function setOr($field, $op, $value)
    {
        return $this->set($field, $op, $value, 'or');
    }

    public function setAnd($field, $op, $value)
    {
        return $this->set($field, $op, $value, 'and');
    }
}

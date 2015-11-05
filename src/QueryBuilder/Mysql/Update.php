<?php

namespace WebDevbr\QueryBuilder\Mysql;

class Update extends Query
{
    public function sql()
    {
        $fields = '';
        if (!empty($this->fields)) {
            foreach ($this->fields as $k => $v) {
                $fields[] = "`{$k}`=:{$k}";
            }

            $fields = implode(', ', $fields);
        }
        return "UPDATE `{$this->table}` SET {$fields}{$this->where};";
    }
}

<?php

namespace WebDevBr\QueryBuilder\Mysql;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    public function testChecarSeOSqlRetornaCorreto()
    {
        $update = new Update;

        $fields = [
            'id'=>1
        ];

        $update->fields($fields);

        $sql = $update->sql();

        $this->assertEquals('UPDATE `users` SET `id`=:id;', $sql);
    }

    public function testChecarSeOSqlRetornaCorretoComDoisCampos()
    {
        $update = new Update;

        $fields = [
            'id'=>1,
            'name'=>'Erik',
        ];

        $update->fields($fields);

        $sql = $update->sql();

        $this->assertEquals('UPDATE `users` SET `id`=:id, `name`=:name;', $sql);
    }

    public function testChecarSeOSqlRetornaCorretoComWhere()
    {
        $update = new Update;
        $where = new Where;

        $where->set('id', '=', 1);

        $update->where($where);

        $fields = [
            'name'=>'Erik',
        ];

        $update->fields($fields);

        $sql = $update->sql();

        $this->assertEquals('UPDATE `users` SET `name`=:name WHERE `id`=:id;', $sql);
    }
}

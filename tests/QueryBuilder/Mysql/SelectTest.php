<?php

namespace WebDevBr\QueryBuilder\Mysql;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    public function testChecarSeOSqlRetornaCorreto()
    {
        $select = new Select;
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM users;', $sql);
    }

    public function testChecarSeOSqlRetornaComTablePages()
    {
        $select = new Select;
        $select->table = 'pages';
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM pages;', $sql);
    }

    public function testSelecionarColunasAReceberDoBanco()
    {
        $select = new Select;

        $fields = [
            'name',
            'email',
            'password'
        ];

        $select->fields($fields);
        $sql = $select->sql();

        $this->assertEquals('SELECT `name`, `email`, `password` FROM users;', $sql);
    }

    public function testSelecionarColunasAReceberDoBancoComTablePersonalizada()
    {
        $select = new Select;

        $select->table = 'pages';

        $fields = [
            'name',
            'email',
            'password'
        ];

        $select->fields($fields);
        $sql = $select->sql();

        $this->assertEquals('SELECT `name`, `email`, `password` FROM pages;', $sql);
    }

    public function testSelectComWhere()
    {
        $select = new Select;
        $where = new Where;

        $where->set('id', '=', 1);

        $select->table = 'pages';
        $select->where($where);
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM pages WHERE `id`=:id;', $sql);
    }

    public function testSelectComDoisWheres()
    {
        $select = new Select;
        $where = new Where;

        $where->set('id', '=', 1);
        $where->set('name', '=', 'Erik');

        $select->table = 'pages';
        $select->where($where);
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM pages WHERE `id`=:id and `name`=:name;', $sql);
    }

    public function testSelectComWheresComOr()
    {
        $select = new Select;
        $where = new Where;

        $where->set('id', '=', 1, 'or');
        $where->set('name', '=', 'Erik', 'or');

        $select->table = 'pages';
        $select->where($where);
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM pages WHERE `id`=:id or `name`=:name;', $sql);
    }

    public function testSelectComWheresComOrEAnd()
    {
        $select = new Select;
        $where = new Where;

        $where->set('id', '=', 1);
        $where->set('last_name', '=', 1, 'or');
        $where->set('name', '=', 'Erik', 'or');

        $select->table = 'pages';
        $select->where($where);
        $sql = $select->sql();

        $this->assertEquals('SELECT * FROM pages WHERE `id`=:id and `last_name`=:last_name or `name`=:name;', $sql);
    }
}

<?php

include 'vendor/autoload.php';

$select = new WebDevBr\QueryBuilder\Mysql\Select;
var_dump($select->sql());
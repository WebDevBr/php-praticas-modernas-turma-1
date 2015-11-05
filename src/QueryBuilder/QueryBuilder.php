<?php

namespace WebDevBr\QueryBuilder;

class QueryBuilder
{
    private static $execute;
    private static $pdo;
    private static $conn;

    protected function __construct()
    {

    }

    public static function conn(Array $config)
    {
        $config = new Configurator([
            'dsn'=>'mysql:host=localhost;dbname=php_praticas_modernas',
            'user'=>'root',
            'pass'=>'123',
            'config'=>[]
        ]);
        self::$conn = new Connection($config);
        
    }

    public static function getPdo()
    {
        if (empty(self::$pdo)) {
            self::$conn->conn();
            self::$pdo = self::$conn;
        }
        return new Execute(self::$pdo);
    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}

<?php

/**
 * Class ConnectDB
 */
class ConnectDB
{
    /**
     * @return PDO
     */
    public static function make()
    {
        try {
            return new PDO(
                'mysql:dbname=cadastros;host=localhost',
                'root',
                '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
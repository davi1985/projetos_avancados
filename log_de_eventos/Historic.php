<?php


/**
 * Class Historic
 */
class Historic
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Historic constructor.
     */
    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=projeto_logeventos;host=localhost', 'root', '');
    }

    /**
     * @param $action
     */
    public function register($action)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = 'INSERT INTO historic SET ip = :ip, date_action = NOW(), action = :action' ;
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':ip', $ip);
        $sql->bindValue(':action', $action);
        $sql->execute();

    }

}
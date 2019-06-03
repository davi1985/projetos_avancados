<?php
try {
    $pdo = new PDO('mysql:dbname=projeto-esqueci-senha;host=localhost', 'root', '');
} catch (PDOExeption $e) {
    echo "ERRO:".$e->getMessage();
}

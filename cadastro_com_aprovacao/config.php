<?php
try {
    $pdo = new PDO('mysql:dbname=cadastro;host=localhost', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}

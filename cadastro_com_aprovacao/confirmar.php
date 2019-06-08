<?php
require __DIR__.'/config.php';

$h = $_GET['h'];

if (!empty($h)) {
    $pdo->query("UPDATE users SET status = '1'WHERE MD5(id) = '$h'");

    echo "<h2>Cadastro confirmado com sucesso!</h2>";
}


<?php
include  __DIR__.'/includes/header.php';

require  __DIR__.'/src/ConnectDB.php';
$pdo = ConnectDB::Make();

$h = $_GET['h'];

if (!empty($h)) {
    $sql = $pdo->prepare('UPDATE users SET status = 1 WHERE MD5(id) = :h');
    $sql->bindValue(':h', $h);
    $sql->execute();

    echo '<h2>Cadastro confirmado com sucesso!</h2>';
}
?>

<?php include  __DIR__.'/includes/footer.php';?>

<?php
require __DIR__ . '/config.php';

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);

    $pdo->query("INSERT INTO users name = '$name', email = '$email'");
    $id = $pdo->lastInsertId();
    $md5 = md5($id);
    //$link = 'http://www.b7web.com.br/confirmar.php?h=' . $md5;
    $link = 'http://localhost/php_bonieky/php_avancado/projetos/cadastro_com_aprovacao/confirmar.php?h=' . $md5;


    $assunto = "Confirme seu cadastro.";
    $msg = "Clique no link abaixo para confirmar seu cadastro: \n\n" . $link;
    $headers = "From: suporte@b7web.com.br" . "\r\n"
        . "X-Mailer: PHP/" . phpversion();
    mail($email, $assunto, $msg, $headers);

    echo "<h2>Ok! Confirme seu cadastro agora!</h2><br>";
    echo "<a href='{$link}'>{$link}</a>";

    exit;

}
?>
<form method="post">
    <label for="name">Nome</label><br>
    <input type="text" name="name" id="name"><br><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br><br>
    <input type="submit" value="Cadastar">
</form>
<?php
include 'includes/header.php';

require 'src/ConnectDB.php';
$pdo = ConnectDB::Make();


 if (isset($_POST['name']) && !empty($_POST['name'])) {
     $name = addslashes($_POST['name']);
     $email = addslashes($_POST['email']);

     $sql = "INSERT INTO users(name, email) VALUES (?, ?)";
     $pdo->prepare($sql)->execute([$name, $email]);
     $id = $pdo->lastInsertId();

     $md5 = md5($id);
     //$link= 'http://www.b7web.com.br/cadastroconfirma/confirmar.php?h='.$md5;

     $link = 'http://localhost/php_bonieky/php_avancado/projetos/cadastro_com_aprovacao/confirm.php?h='.$md5;
     //$theme = 'Confirme seu cadastro!';
     //$body = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
     //$headers = "From: suporte@b7web.com.br"."\n\n"."X-Mailer:PHP/".phpversion();
     //mail($email, $theme, $theme, $headers);

     echo '<h2>Confirme seu cadastro agora!</h2>';
     echo "<a href='{$link}'>{$link}</a>";
     exit;
 }

include 'includes/footer.php';

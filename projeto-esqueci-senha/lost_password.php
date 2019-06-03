<?php
include __DIR__ . '/includes/header.php';
require __DIR__ . '/src/config.php';

if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = :email";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $sql = $sql->fetch();
        $user_id = $sql['id'];
        $hash = md5(time() . rand(0, 99999) . rand(0, 99999));
        $expires_in = date('Y-m-d H:i', strtotime('+2 months'));


        $sql = $pdo->prepare('INSERT INTO users_token (user_id, hash, expires_in) VALUES (:user_id, :hash, :expires_in');
        $sql->bindValue(':user_id', $user_id);
        $sql->bindValue(':hash', $hash);
        $sql->bindValue(':expires_in', $expires_in);
        $sql->execute();


        $link = "http://localhost/php_bonieky/php_avancado/projetos/projeto-esqueci-senha/new_password.php?token=" . $hash;

        $email_message = "<p>Clique no link para redefinir sua senha:<br><a href='{$link}'>{$link}</a></p>";

        $theme = "Redefinição de Senha";

        $headers = 'From: seuemail@site.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        //var_dump($email, $theme, $email_message, $headers);

        echo "<div class='container'{$email_message}</div>";
        exit;
    }
}
?>

<div class="container center">
    <form method="POST">
        <div class="form-group">
            <label for="Email"><h4>Qual o seu E-mail?</h4></label>
            <input type="email" class="form-control" id="Email" name="email" placeholder="Enter email"/>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <a href="index.php">Voltar</a>
</div>


<?php include __DIR__ . '/includes/header.php'; ?>

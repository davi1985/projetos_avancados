<?php
include __DIR__ . '/includes/header.php';
require __DIR__ . '/src/config.php';

if (!empty($_GET['token'])) {
    $token = $_GET['token'];

    $sql = 'SELECT * FROM users_token WHERE hash = :hash AND used = 0 AND expires_in > NOW()';
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':hash', $token);
    $sql->execute();

    if ($sql->rowCount() >0) {
    }
}
?>
<div class="container center">
    <form method="POST">
        <div class="form-group">
            <label for="Password"><h4>Digite sua nova Senha:</h4></label>
            <input type="password" class="form-control" id="Password" name="password"
                   placeholder="Enter new Password"/>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Senha</button>
    </form>
</div>

<?php include __DIR__ . '/includes/header.php'; ?>
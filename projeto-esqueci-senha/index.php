<?php include __DIR__.'/includes/header.php'; ?>

<div class="container center">
    <h1>Login</h1>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <a href="lost_password.php">Esqueci minha Senha</a>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include __DIR__.'/includes/footer.php'; ?>
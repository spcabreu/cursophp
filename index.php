<?php require_once("cabecalho.php"); ?>

<?php
if(isset($_GET["erro"])) { ?>
   <p class="alert-danger">Usuário ou senha inválidos!</p>
<?php } ?>
<h2>Login</h2>
<form action="logica-login.php" method="post">
    <div class="form-group">
        <label>Login</label>
        <input class="form-control" type="text" name="login">
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input class="form-control" type="password" name="senha">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php require_once("rodape.php"); ?>
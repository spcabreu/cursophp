<?php
    require_once 'cabecalho.php';
?>
<h1>Contato</h1>
<form method="post" action="logica-contato.php">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input id="nome" type="text" name="nome" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nome">Email:</label>
        <input id="email" type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Mensagem:</label>
        <textarea name="mensagem" class="form-control"></textarea>
    </div>
    <input type="submit" value="Enviar" class="btn btn-primary">
</form>


<?php
   require_once 'rodape.php'; 
?>
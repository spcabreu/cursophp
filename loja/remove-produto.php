<?php

require_once 'sessao.php';
require_once 'conexao.php';
require_once 'banco-produto.php';

$id = $_POST['id'];
removeProduto($conexao, $id);
header("LOCATION:produto-lista.php?excluido=true");
die();
verificaUsuario();

?>

<p class="text-sucess">Produto <?=id?> removido!</p>

<?php

require_once 'rodape.php';

?>
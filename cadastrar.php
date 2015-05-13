<?php
if (!class_exists('Pessoa', false)) {
    require( 'bd\Pessoa.php');
}
if (!class_exists('Cadastro', false)) {
    require( 'Cadastro.php');
}

$pessoa = new Pessoa($_POST["nome"], $_POST["endereco"], $_POST["email"], $_POST["telefone"], $_POST["trabalho"], $_POST["celular"]);
$cadastro = new Cadastro();

echo $cadastro->cadastrarMongo($pessoa);


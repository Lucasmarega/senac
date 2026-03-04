<?php
include_once "objetos/alunoController.php";

$controller = new AlunoController();
$alunos = $controller->index();
global $alunos;
$a = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["pesquisar"])){
        $a = $controller->pesquisarAluno($_POST["pesquisar"]);
    }
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["excluir"])){
        $a = $controller->excluirAluno($_GET["excluir"]);
    }
}

var_dump($a);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Hell Claro</title>

    <style>
        table,tr,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<h1>Senac Rio Claro</h1>
<a href="cadastro.php">Cadastrar Aluno</a>
<h3>Pesquisar Aluno</h3>

<form method="post" action="index.php">
    <label>RA</label>
    <input type="number" name="pesquisar">
    <select name="tipo">
        <option value="ra">RA</option>
        <option value="nome">Nome</option>
    </select>
    <button>Pesquisar</button>
</form>

<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
        <td>e-mail</td>
    </tr>
    <?php if($a) : ?>
            <tr>
                <td><?= $a->ra; ?></td>
                <td><?= $a->nome; ?></td
            </tr>
    <?php endif; ?>
</table>
<h2>Alunos Cadastrado</h2>
<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
        <td>e-mail</td>
        <td>Telefone</td>
        <td>Login</td>
    </tr>
    <?php if($alunos) : ?>
    <?php foreach($alunos as $aluno) : ?>
    <tr>
        <td><?= $aluno->ra?></td>
        <td><?= $aluno->nome?></td>
        <td><?= $aluno->telefone?></td>
        <td><?= $aluno->login?></td>
        <td><?= $aluno->email?></td>
        <td><a href="index.php?excluir=<?= $aluno->ra ?>">EXCLUIR</a> </td>
        <td><a href="atualizar.php?alterar=<?= $aluno->ra ?>">ALTERAR</a> </td>

    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>

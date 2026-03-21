<?php
include_once "objetos/alunoController.php";

session_start();

if(!isset($_SESSION["aluno"])){
    header("Location: login.php");
    exit();
}

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
    <title>Senac Rio Claro</title>

    <style>
        table,tr,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<p>

    <strong>Usuário logado: </strong><?= $_SESSION['aluno']->nome ?>
    - <a href="logout.php>">Sair</a>
    </p>

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


    <tr>

    <?php if($alunos) : ?>
    <?php foreach($alunos as $aluno) : ?>
    <tr>
        <td><a href="ver-aluno.php?ra="<?= $aluno->ra; ?>"><?= $aluno->ra; ?></a></td>
        <td><?= $aluno->nome?></td>
        <td><?= $aluno->email?></td>


        <?php if($aluno->imagem =="") :  ?>
        <td><img style="width: 20%;" src="imagens/image-fail.png"></td>
        <?php else :  ?>
        <td><img style="width: 20%;" src="uploads/<?= $aluno->imagem;?>"></td>
        <?php endif; ?>


        <td><a href="atualizar.php?alterar=<?= $aluno->ra ?>">ALTERAR</a></td>
        <td><a href="index.php?excluir=<?= $aluno->ra ?>">EXCLUIR</a></td>
        <td><a href="ver-aluno.php?ra=<?= $aluno->ra ?>">Visualizar</a></td>

    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>

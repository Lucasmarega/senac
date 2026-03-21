<?php
include("objetos/alunoController.php");

$controller = new AlunoController();

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ra'])){
    $a = $controller->localizarAluno($_GET['ra']);

}

var_dump($a)
?>




<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aluno: <?= $a->nome ?></title>
</head>

<body>
    <button>Voltar</button>
    <h1>#<?= $a->ra ?> - <?= $a->nome ?></h1>
    <p><strong>Email: </strong><?= $a->email ?></p>
    <p><strong>Telefone: </strong><?= $a->telefone ?></p>
    <p><strong>Login: </strong><?= $a->login ?></p>
    <?php if($a->imagem =="") :  ?>
        <td><img style="width: 20%;" src="imagens/image-fail.png"></td>
    <?php else :  ?>
        <td><img style="width: 20%;" src="uploads/<?= $a ->imagem;?>"></td>
    <?php endif; ?>

    <a href="index.php"><button>Voltar</button></a>


</body>
</html>
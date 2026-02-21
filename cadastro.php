<?php
include("objetos/alunoController.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new AlunoController();

    if (isset($_POST["cadastrar"])){
        $a = $controller->cadastrarAluno($_POST["aluno"]);
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de aluno</title>
</head>
<body>

<h1>cadastro de aluno</h1>
<a href="index.php">Voltar</a>

<form action="cadastro.php" method="post">
    <label>Nome</label>
    <input type="text" name=aluno[nome]"><br><br>

    <label>e-mail</label>
    <input type="email" name=aluno[email]"><br><br>

    <label>telefone</label>
    <input type="text" name=aluno[telefone]"><br><br>

    <label>Login</label>
    <input type="text" name=aluno[login]"><br><br>

    <label>Senha</label>
    <input type="password" name=aluno[senha]"><br><br>

    <button name="cadastrar">cadastrar</button>
</form>

</body>
</html>
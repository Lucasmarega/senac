<?php
Class aluno{
    public $ra;
    public $nome;
    public $email;
    public $telefone;
    public $senha;
    public $img;
    public $bd;


    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM alunos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado ->fetchAll(PDO::FETCH_OBJ);
    }
}
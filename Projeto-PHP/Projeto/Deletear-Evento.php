<?php require_once __DIR__ . "/BancoDeDados.php"; ?>


<?php

class ExcluirEvento
{
    private $idUsuariodeletar;


    function excluir($idUsuariodeletar)
    {

        $b = new BancoDeDados;
        $id = $_POST["idUsuariodeletar"];
        $b->delete($id);
    }

}

$vldLogin = new ExcluirEvento;

$idUsuariodeletar = $_POST["idUsuariodeletar"];
$vldLogin->excluir($idUsuariodeletar);
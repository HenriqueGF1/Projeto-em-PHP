<?php require_once __DIR__ . "/BancoDeDados.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>

<?php

class validarEdicaoEvento
{

    private $id;
    private $nome;
    private $data;
    private $horario;
    private $localizacao;

    function validarEvento($id, $nome, $data, $horario, $localizacao)
    {

        $banco = new BancoDeDados;

        if (empty($nome) || empty($data) || empty($horario) || empty($localizacao)) {
            $_SESSION["erro"] = "<h5>Preencha Todos Os Campos</h5>";
            header("Location:Form-EditarEvento.php?idUsuarioatualizar=" . $id);
            die();
        } elseif (is_numeric($nome)) {
            $_SESSION["erro"] = "<h5>Digite Um Nome Valido</h5>";
            header("Location:Form-EditarEvento.php?idUsuarioatualizar=" . $id);
            die();
        } else {
            $banco = new BancoDeDados;
            $banco->update($id, $nome, $localizacao, $data, $horario);
        }

    }

}

$vldLoginEvento = new validarEdicaoEvento;
$id = addslashes($_POST["idUsuarioatualizar"]);
$nome = addslashes($_POST["nome"]);
$data = addslashes($_POST["data"]);
$horario = addslashes($_POST["horario"]);
$localizacao = addslashes($_POST["localizacao"]);
$vldLoginEvento->validarEvento($id, $nome, $data, $horario, $localizacao);
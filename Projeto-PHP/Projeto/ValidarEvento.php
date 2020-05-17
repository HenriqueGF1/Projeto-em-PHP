<?php require_once __DIR__ . "/BancoDeDados.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>

<?php

class ValidarEvento
{

    private $nome;
    private $data;
    private $horario;
    private $localizacao;

    function validar($nome, $data, $horario, $localizacao)
    {

        $b = new BancoDeDados;

        if (empty($nome) || empty($data) || empty(horario) || empty(localizacao)) {
            $_SESSION["erro"] = "<h5>Preencha Todos Os Campos</h5>";
            header("Location:Form-AdicionarEvento.php");
            die();
        } elseif (is_numeric($nome)) {
            $_SESSION["erro"] = "<h5>Digite Um Nome Valido</h5>";
            header("Location:Form-AdicionarEvento.php");
            die();
        } else {
            $b = new BancoDeDados;
            $b->insert($nome, $localizacao, $data, $horario);
        }
    }

}

$vldEvento = new ValidarEvento;
$nome = addslashes($_POST["nome"]);
$data = addslashes($_POST["data"]);
$horario = addslashes($_POST["horario"]);
$localizacao = addslashes($_POST["localizacao"]);
$vldEvento->validar($nome, $data, $horario, $localizacao);
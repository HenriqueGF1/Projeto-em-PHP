<?php require_once __DIR__ . "/BancoDeDados.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>
<?php

class ValidarConta
{
    private $email;
    private $senha;

    function validar($email, $senha)
    {

        if (empty($email) && empty($senha)) {
            $_SESSION["erro"] = "<h5>Preencha Todos Os Campos</h5>";
            header("Location:Form-CriarConta.php");
            die();
        } elseif (empty($email)) {
            $_SESSION["erro"] = "<h5>Preencha o Campo De Email</h5>";
            header("Location:Form-CriarConta.php");
            die();
        } elseif (empty($senha)) {
            $_SESSION["erro"] = "<h5>Preencha o Campo De Senha</h5>";
            header("Location:Form-CriarConta.php");
            die();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["erro"] = "<h5>Digite Um Email Valido</h5>";
            header("Location:Form-CriarConta.php");
            die();
        } else {
            $banco = new BancoDeDados;
            $banco->insertUser($email, $senha);
        }
    }

}

$vldConta = new ValidarConta;
$email = addslashes($_POST["email"]);
$senha = md5(addslashes($_POST["senha"]));
$vldConta->validar($email, $senha);
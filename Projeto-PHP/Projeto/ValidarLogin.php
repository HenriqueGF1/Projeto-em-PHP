<?php require_once __DIR__ . "/BancoDeDados.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>
<?php

class ValidarLogin
{
    private $email;
    private $senha;

    function validar($email, $senha)
    {

        if (empty($email) && empty($senha)) {
            $_SESSION["erro"] = "<h5>Preencha Todos Os Campos</h5>";
            header("Location:Form-Login.php");
            die();
        } elseif (empty($email)) {
            $_SESSION["erro"] = "<h5>Preencha o Campo De Email</h5>";
            header("Location:Form-Login.php");
            die();
        } elseif (empty($senha)) {
            $_SESSION["erro"] = "<h5>Preencha o Campo De Senha</h5>";
            header("Location:Form-Login.php");
            die();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["erro"] = "<h5>Digite Um Email Valido</h5>";
            header("Location:Form-Login.php");
            die();
        } else {
            $b = new BancoDeDados;
            $b->loginUser($email, $senha);
        }
    }

}

$vldLogin = new ValidarLogin;
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);
$vldLogin->validar($email, $senha);
<?php require_once __DIR__ . "/Sessoes.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="node_modules/bootstrap/scss/bootstrap.scss">
    <link rel="stylesheet" href="css/main.css">
</head>


<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">EVENTOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li id="menu">
                <li class="nav-item">
                    <?php if (!isset($_SESSION["idUsuario"])): ?>
                        <a id="botaoLogin" class="btn btn-secondary" href="Form-Login.php" role="button">Login</a>
                        <a class="btn btn-success" href="Form-CriarConta.php" role="button">Ciar Conta</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION["idUsuario"])): ?>

                        <a id="botaoCriarConta" class="btn btn-primary" href="Form-AdicionarEvento.php" role="button">Adicionar
                            Evento</a>
                        <a id="botaoSair" class="btn btn-danger" href="Logout.php" role="button">Sair</a>
                    <?php endif; ?>
                </li>
                </li>

            </ul>
        </div>
    </nav>

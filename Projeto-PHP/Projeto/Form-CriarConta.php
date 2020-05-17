<?php require_once __DIR__ . "/header.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>

<div class="row">
    <div class="col-6 mx-auto">
        <div class="my-5 text-center">
            <h1 class="display-4">Crie Sua Conta</h1>
        </div>

        <?php if (isset($_SESSION["erro"])) { ?>
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <strong><?= $_SESSION["erro"]; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION["erro"]); ?>
        <?php } ?>


        <form action="ValidarConta.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data"
              autocomplete="on">
            <div class="form-group">
                <label><h5>Email</h5></label>
                <input type="text" name="email" class="form-control" placeholder="Digite Seu Email">
            </div>
            <div class="form-group">
                <label><h5>Senha</h5></label>
                <input type="password" name="senha" class="form-control" placeholder="Ate 6 Caracteres" minlength="6">
            </div>
            <div class="my-5 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/footer.php"; ?>

<?php require_once __DIR__ . "/header.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>


<div class="row my-5">
    <div class="col-6 mx-auto my-5">

        <?php if (isset($_SESSION["erro"])) { ?>
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <strong><?= $_SESSION["erro"]; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION["erro"]); ?>
        <?php } ?>


        <form action="ValidarEvento.php" method="post">
            <div class="form-group">
                <label>
                    <h5>Nome do Evento</h5>
                </label>
                <input type="text" name="nome" class="form-control" id="">
            </div>
            <div class="form-group">
                <label>
                    <h5>Data do Evento</h5>
                </label>
                <input type="date" name="data" class="form-control" id=""
                min="<?= date('Y-m-d') ?>" >       
            </div>
            <div class="form-group">
                <label>
                    <h5>Horário do Evento</h5>
                </label>
                <input type="time" name="horario" class="form-control" id="">
            </div>
            <div class="form-group">
                <label>
                    <h5>Localização do Evento</h5>
                </label>
                <textarea name="localizacao" class="form-control" rows="3"></textarea>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-danger">Apagar</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/footer.php"; ?>





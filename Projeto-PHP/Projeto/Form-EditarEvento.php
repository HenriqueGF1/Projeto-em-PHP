<?php require_once __DIR__ . "/header.php"; ?>
<?php require_once __DIR__ . "/BancoDeDados.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>

<div class="row">
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

        <?php $id = addslashes($_GET["idUsuarioatualizar"]); ?>
        <?php $rows = $banco->selectId($id); ?>
        <?php foreach ($rows as $row): ?>

            <form action="ValidarEdicaoEvento.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="idUsuarioatualizar" value="<?= $row['id'] ?>">
                </div>
                <div class="form-group">
                    <label>
                        <h5>Nome do Evento</h5>
                    </label>
                    <input type="text" value="<?= $row["nome"]; ?>" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label>
                        <h5>Data do Evento</h5>
                    </label>
                    <input type="date" id="" name="data" value="<?= date('Y-m-d', strtotime($row["data"])) ?>"
                           class="form-control"
                           min="<?= date('Y-m-d', strtotime($row["data"])) ?>">
                </div>
                <div class="form-group">
                    <label>
                        <h5>Horario do Evento</h5>
                    </label>
                    <input type="time" value="<?= $row["horario"]; ?>" name="horario" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label>
                        <h5>Localização do Evento</h5>
                    </label>
                    <textarea class="form-control" name="localizacao"
                              rows="3"><?= $row["localizacao"]; ?></textarea>
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-danger">Apagar</button>
                </div>
            </form>
        <?php endforeach ?>

    </div>
</div>


<?php require_once __DIR__ . "/footer.php"; ?>




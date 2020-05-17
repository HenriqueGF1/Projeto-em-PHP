<?php require_once __DIR__ . "/header.php"; ?>
<?php require_once __DIR__ . "/Sessoes.php"; ?>
<?php require_once __DIR__ . "/Categorias.php"; ?>
<?php require_once __DIR__ . "/BancoDeDados.php"; ?>

    <div class="row">
        <?php if (isset($_GET["a"])): ?>
            <?php $palavra = $_POST["palavra"] ?>
            <?php $palavra = trim($palavra) ?>
            <?php $rows = $banco->procura($palavra); ?>
            <?php if (count($rows) == 0): ?>
                <div class="col-12 my-5 justify-content-center text-center">
                    <h3 class="text-danger">Nenhum Resultado</h3>
                </div>
            <?php endif; ?>
            <?php if (count($rows) > 0): ?>
                <div class="col-12 mx-auto my-5">
                <div class="card-deck">
                <?php $rows = $banco->procura($palavra); ?>
                <?php foreach ($rows as $row): ?>
                    <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card h-80" id="entorno">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="card-title text-center"><?= $row["nome"]; ?></h4>
                            </div>
                            <p class="card-text">Data: <?= date("d/m/Y", strtotime($row["data"])) ?> Horario:
                                <?= date('h:i', strtotime($row["horario"])); ?></p>
                            <p class="card-text text-muted"><?= $row["localizacao"]; ?></p>
                        </div>
                        <div class="card-text">
                                <div class="text-center mb-2">
                                    <p><small>Compartilhe Com os Amigos!!</small></p>
                                    <a href="#"><img src="img/a.png" width="20"></a>
                                    <a href="#"><img src="img/b.png" width="20"></a>
                                    <a href="#"><img src="img/c.png" width="20"></a>
                                </div>
                        </div>
                        <?php if (isset($_SESSION["idUsuario"])): ?>
                            <div class="form-inline p-3 my-2 my-lg-0 d-flex justify-content-center">
                                <form action="Deletear-Evento.php" method="post">
                                    <input type="hidden" name="idUsuariodeletar" value="<?= $row['id'] ?>">
                                    <button type="submit" id="botaoSair" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                                <div class="mr-3"></div>
                                <form action="Form-EditarEvento.php" method="get">
                                    <input type="hidden" name="idUsuarioatualizar" value="<?= $row['id'] ?>">
                                    <button type="submit" id="editar" class="btn btn-warning btn-sm">Editar</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
                </div>
                <?php endforeach ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php require_once __DIR__ . "/footer.php"; ?>
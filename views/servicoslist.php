<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Serviços</li>
</ol>

<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Serviços</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>
                <div class="card mb-3">
                    <div class="card-header"
                         style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between">
                        <span style="display: flex; flex-wrap: wrap; align-items: center;"> Pesquisar:
                        <input style="width: 250px; margin-left: 10px;" type="text" id="filtro_busca"
                               class="form-control">
                        </span>
                        <span>
                            <a href="<?= BASE_URL ?>servicoedit">
                                <button class="btn btn-success"><i class="fa fa fa-wrench"></i> Novo </button>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered tabelacliente" id="dataTable" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ativo</th>
                                    <th style="width:50px;"></th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php if (count($servicos) > 0) {
                                    foreach ($servicos as $v) {
                                        ?>
                                        <tr>
                                            <td><?= $v['nome'] ?></td>
                                            <td><?= $v['ativo'] ?></td>
                                            <td style="display: flex; justify-content: center;">
                                                <a href="<?= BASE_URL ?>servicoedit?id=<?= $v['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fa fa-edit"></i> Ver
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
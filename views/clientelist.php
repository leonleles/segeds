<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Gerenciar Clientes</li>
</ol>

<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Clientes</th>
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
                            <a href="<?= BASE_URL ?>clientenew?s=clientelist">
                                <button class="btn btn-success"><i class="fa fa-user-plus"></i> Novo </button>
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
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                    <th></th>
                                </tr>

                                </thead>
                                <tbody>

                                <?php if (count($clientes) > 0) {
                                    foreach ($clientes as $v) {
                                        ?>
                                        <tr>
                                            <td><?= $v['nome'] ?></td>
                                            <td><?= $v['telefone'] ?></td>
                                            <td><?= $v['cpf'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL ?>clienteedit?id=<?= $v['id'] ?>">
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
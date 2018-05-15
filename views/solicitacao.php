<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Solicitação</li>
</ol>
<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Solicitação</th>
        </tr>
        </thead>

        <tbody>

        <td>
            <input type="hidden" id="id" value="<?= 12 ?>">


            <label>Cliente:</label>
            <select id="cliente" name="cliente" class="form-control ls-select" required>
                <option value=""></option>
                <?php if (count($clientes) > 0) {
                    foreach ($clientes as $v) { ?>
                        <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['cliente_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?> - <?= $v['cpf']?></option>
                    <?php }
                } ?>

            </select>

            <label>Tipo de Serviço:</label>
            <select id="cliente" name="cliente" class="form-control ls-select" required>
                <option value=""></option>
                <?php if (count($servicos) > 0) {
                    foreach ($servicos as $v) { ?>
                        <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['servico_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?></option>
                    <?php }
                } ?>
            </select>

            <fieldset>
                <legend>Dados de Agendamento</legend>

                <div class="form-group">
                    <label>Agendamento:</label>
                    <input type="date" class="form-control col-4">
                    <input type="time" class="form-control col-3">
                </div>


                <label>Técnico:</label>
                <select class="form-control ls-select" required>
                    <option value=""></option>
                    <?php if (count($tecnicos) > 0) {
                        foreach ($tecnicos as $v) { ?>
                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['tecnico_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?></option>
                        <?php }
                    } ?>
                </select>


            </fieldset>

            <label>Nome:</label>
            <input type="text" class="form-control" id="nome" value="<?= "teste" ?>">

            <div class="form-group" style="margin-top: 30px">
                <label for="ativo">Ativo:</label>
                <div class="btn btn-secondary">
                    <?php if ($solicitacao['ativo']) { ?>
                        <input id="ativo" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="ativo" type="checkbox">
                    <?php } ?>
                </div>
            </div>

            <button type="button" style="margin-top: 30px;" class="btn btn-success save-solicitacao" id="save-servico">
                <i
                        class="fa fa-upload"></i> Emitir
            </button>
            <a class="btn btn-default" href="<?= BASE_URL ?>home" style="margin: 30px 0 0 10px"><i
                        class="fa fa-reply"></i> Voltar</a>
        </td>

        </tbody>
    </table>
</div>
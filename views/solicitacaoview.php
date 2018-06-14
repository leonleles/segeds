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
            <input type="hidden" id="id" value="<?= $solicitacao['id'] ?>">
            <input type="hidden" id="id_agendamento" value="<?= $solicitacao['id_agendamento'] ?>">

            <form id="formulario">

                <label>Cliente:</label>
                <select id="cliente" name="cliente" class="form-control ls-select" disabled>
                    <option value=""></option>
                    <?php if (count($clientes) > 0) {
                        foreach ($clientes as $v) { ?>
                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['cliente_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?>
                                - <?= $v['cpf'] ?></option>
                        <?php }
                    } ?>

                </select>

                <span class="mensagem" id="msg_cliente"></span>

                <label>Tipo de Serviço:</label>
                <select id="servico" name="cliente" class="form-control ls-select" disabled>
                    <option value=""></option>
                    <?php if (count($servicos) > 0) {
                        foreach ($servicos as $v) { ?>
                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['servico_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?></option>
                        <?php }
                    } ?>
                </select>

                <fieldset>
                    <legend>Dados de Agendamento</legend>

                    <div class="form-group" id="agendamento">
                        <label>Agendamento:</label>
                        <input type="date" required value="<?= $solicitacao['data'] ?>"  disabled class="form-control col-4">
                        <input type="time" required value="<?= $solicitacao['hora'] ?>"  disabled class="form-control col-3">
                    </div>

                    <div class="form-group" id="previsao">
                        <label>Previsão de término:</label>
                        <input type="date" required value="<?= $solicitacao['data_previsao'] ?>" disabled class="form-control col-4">
                        <input type="time" required value="<?= $solicitacao['hora_previsao'] ?>" disabled class="form-control col-3">
                    </div>


                    <label>Técnico:</label>
                    <select class="form-control ls-select" id="tecnico" disabled>
                        <option value=""></option>
                        <?php if (count($tecnicos) > 0) {
                            foreach ($tecnicos as $v) { ?>
                                <option value="<?= $v['id'] ?>" <?= ($v['id'] == $solicitacao['tecnico_id']) ? ' selected' : null ?>><?= mb_strtoupper($v['nome']) ?></option>
                            <?php }
                        } ?>
                    </select>

                    <span class="mensagem" id="msghorario"></span>


                </fieldset>

                <div class="form-group" style="margin-top: 30px">
                    <label for="ativo">Ativo:</label>
                    <div class="btn btn-secondary">
                        <?php if ($solicitacao['ativo']) { ?>
                            <input id="ativo" type="checkbox" checked  disabled>
                        <?php } else { ?>
                            <input id="ativo" type="checkbox" disabled>
                        <?php } ?>
                    </div>
                </div>
                <a class="btn btn-default" href="<?= BASE_URL ?>solicitacoes" style="margin: 30px 0 0 10px"><i
                            class="fa fa-reply"></i> Voltar</a>
            </form>
        </td>

        </tbody>
    </table>
</div>
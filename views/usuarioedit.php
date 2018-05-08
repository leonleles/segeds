<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Usuário</li>
</ol>
<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Usuário</th>
        </tr>
        </thead>

        <tbody>

        <td>
            <input type="hidden" id="id" value="<?= $servico['id'] ?>">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" value="<?= $servico['nome'] ?>">

            <div class="form-group" style="margin-top: 30px">
                <label for="ativo">Ativo:</label>
                <div class="btn btn-secondary">
                    <?php if ($servico['ativo']) { ?>
                        <input id="ativo" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="ativo" type="checkbox">
                    <?php } ?>
                </div>
            </div>

            <button type="button" style="margin-top: 30px;" class="btn btn-success save-servico" id="save-servico"><i
                        class="fa fa-save"></i> Salvar
            </button>
            <a class="btn btn-default" href="<?= BASE_URL ?>servicoslist" style="margin: 30px 0 0 10px"><i
                        class="fa fa-reply"></i> Voltar</a>

        </td>

        </tbody>
    </table>
</div>
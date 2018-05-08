<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Município</li>
</ol>

<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Editar Município</th>
        </tr>
        </thead>

        <tbody>

        <td>
            <input type="hidden" name="id_municipio" value="<?= $municipio[0]['id'] ?>">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome-municipio" value="<?= $municipio[0]['nome'] ?>">

            <div class="form-group" style="margin-top: 30px">
                <label for="ativo">Ativo:</label>
                <div class="btn btn-secondary">
                    <?php if ($municipio[0]['ativo'] == 1) { ?>
                        <input id="ativo_municipio" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="ativo_municipio" type="checkbox">
                    <?php } ?>
                </div>
            </div>

            <button type="button" style="margin-top: 30px;" class="btn btn-success save-municipio" id="save-municipio">
                <i
                        class="fa fa-save"></i> Salvar
            </button>
            <a class="btn btn-default" href="<?= BASE_URL ?>localidadelist" style="margin: 30px 0 0 10px"><i
                        class="fa fa-reply"></i> Voltar</a>
        </td>

        </tbody>

    </table>
</div>
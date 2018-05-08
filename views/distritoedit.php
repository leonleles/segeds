<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Distrito</li>
</ol>

<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Editar Distrito</th>
        </tr>
        </thead>

        <tbody>

        <td>
            <input type="hidden" name="id_distrito" value="<?= $distrito['id'] ?>">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome-distrito" value="<?= $distrito['nome'] ?>">

            <label for="nome" style="margin-top: 25px">Município:</label>
            <select name="" class="form-control" id="id_municipio">
                <?php foreach ($municipios as $v) { ?>
                    <option value="<?= $v['id'] ?>" <?= ($v['id'] == $distrito['municipio_id']) ? 'selected' : '' ?>><?= $v['nome'] ?></option>
                <?php } ?>
            </select>

            <div class="form-group" style="margin-top: 30px">
                <label for="ativo">Ativo:</label>
                <div class="btn btn-secondary">
                    <?php if ($distrito['ativo']) { ?>
                        <input id="ativo_distrito" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="ativo_distrito" type="checkbox">
                    <?php } ?>
                </div>
            </div>


            <button type="button" style="margin-top: 30px;" class="btn btn-success save-distrito" id="save-distrito"><i
                        class="fa fa-save"></i> Salvar
            </button>
            <a class="btn btn-default" href="<?= BASE_URL ?>localidadelist" style="margin: 30px 0 0 10px"><i
                        class="fa fa-reply"></i> Voltar</a>
        </td>

        </tbody>

    </table>
</div>
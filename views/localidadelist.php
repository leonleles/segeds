<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Localidades</li>
</ol>
<div class="form-group topo">
    <label for="inputsm">Municipio:</label>

    <select class="form-control select-municipio" id="sel1">
        <?php foreach ($municipios as $v) { ?>
            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
        <?php } ?>
    </select>

    <button class="btn btn-secondary" id="click-edit-municipio" title="Editar Município"><i class="fa fa-edit"></i>
    </button>

    <input type="text" id="nome-municipio" class="form-control" placeholder="Adicionar município">
    <button type="button" class="btn btn-info fa fa-plus-circle" id="add-municipio"></button>
</div>

<div class="form-group">

    <div class="form-group" style="margin: 55px 0 0 0; width: 250px;">
        <input type="text" id="filtro_busca" class="form-control" placeholder="Pesquisar">
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Distrito</th>
            <th>Ativo</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (count($distritos) > 0) {
            foreach ($distritos as $v) { ?>
                <tr>
                    <td class="nome_distrito"><?= $v['nome'] ?></td>
                    <td>
                        <?php if ($v['ativo'] == 1) { ?>
                            <input id="distrito-ativo" type="checkbox" checked="checked">
                        <?php } else { ?>
                            <input id="distrito-ativo" type="checkbox">
                        <?php } ?>
                    </td>
                    <td class="id-distrito editar-distrito" id="<?= $v['id'] ?>"><i class="fa fa-edit"></i></td>
                </tr>
            <?php }
        } ?>

        </tbody>
    </table>


    <!--    <div class="form-group opcoes">-->
    <!--        <input type="text" class="form-control" id="input-distrito" placeholder="Novo distrito">-->
    <!--        <button type="button" class="btn btn-info fa fa-plus-circle" id="add-distrito"></button>-->
    <!--    </div>-->

    <div class="form-group salvar">
        <input type="text" class="form-control" id="input-distrito" placeholder="Adicionar distrito">
        <button type="button" class="btn btn-info fa fa-plus-circle" id="add-distrito"
                style="margin: 0 90px 0 5px"></button>

        <button type="button" class="btn btn-success" id="salvar-todos"><i class="fa fa-save"></i> Salvar</button>
        <a class="btn btn-danger" href="<?= BASE_URL ?>home" style="margin-left: 5px">Cancelar</a>
    </div>

</div>

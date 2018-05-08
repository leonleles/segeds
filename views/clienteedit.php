<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Cliente</li>
</ol>

<div class="form-group">

    <table class="table">
        <thead>
        <tr>
            <th>Cliente</th>
        </tr>
        </thead>

        <tbody>
        <td>
            <fieldset>
                <form name="formulario">
                    <!-- Text input-->
                    <input type="hidden" id="id" value="<?= $cliente['id'] ?>">
                    <input type="hidden" id="id_endereco" value="<?= $endereco['id'] ?>">
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="cod_user">Nome:</label>
                        <div class="col-md-9">
                            <input id="nome" name="nome" type="text" placeholder="" value="<?= $cliente['nome'] ?>"
                                   class="form-control input-sm" required>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="nome">Telefone:</label>
                        <div class="col-md-4">
                            <input id="telefone" name="telefone" type="text" value="<?= $cliente['telefone'] ?>"
                                   placeholder=""
                                   class="form-control input-md"
                                   required="">

                        </div>
                        <label class="col-md-1 control-label" for="nome">CPF/CNPJ:</label>
                        <div class="col-md-4">
                            <input id="cpf_cnpj" name="cpf_cnpj" type="text" placeholder=""
                                   class="form-control input-md" value="<?= $cliente['cpf'] ?>"
                                   required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="nome">RG:</label>
                        <div class="col-md-2">
                            <input id="rg" name="rg" type="text" value="<?= $cliente['rg'] ?>" placeholder=""
                                   class="form-control input-md">
                        </div>

                        <label class="col-md-1 control-label" for="nome">Org/Ex:</label>
                        <div class="col-md-2">
                            <input id="orgaoex" name="orgaoex" type="text" placeholder=""
                                   value="<?= $cliente['orgaoex'] ?>" class="form-control input-md">
                        </div>

                        <label class="col-md-1 control-label" for="nome">Nasc:</label>
                        <div class="col-md-3">
                            <input id="nasc" name="nasc" type="date" placeholder="" class="form-control input-md"
                                   value="<?= $cliente['data_nascimento'] ?>" required="">
                        </div>
                    </div>

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Dados Endereço</legend>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome"
                                   style="padding-right: 57px;">Mun:</label>
                            <div class="col-md-3">
                                <select id="municipio" name="municipio" class="form-control" required>
                                    <?php if (count($municipios) > 0) {
                                        foreach ($municipios as $v) { ?>
                                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $cliente['municipio_id']) ? 'selected="selected"' : '' ?>><?= $v['nome'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <label class="col-md-1 control-label" for="nome">Distrito:</label>
                            <div class="col-md-3">
                                <select id="distrito" name="distrito" class="form-control">
                                    <option value=""></option>
                                    <?php if (count($distritos) > 0) {
                                        foreach ($distritos as $v) { ?>
                                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $cliente['distrito_id']) ? 'selected="selected"' : '' ?>><?= $v['nome'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Rua:</label>
                            <div class="col-md-9">
                                <input id="rua" name="rua" value="<?= $endereco['rua'] ?>" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Bairro:</label>
                            <div class="col-md-6">
                                <input id="bairro" name="bairro" value="<?= $endereco['bairro'] ?>" type="text"
                                       placeholder=""
                                       class="form-control input-md">
                            </div>
                            <label class="col-md-1 control-label" for="nome">N°:</label>
                            <div class="col-md-2">
                                <input id="numero" name="numero" value="<?= $endereco['numero'] ?>" type="text"
                                       placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Compl:</label>
                            <div class="col-md-9">
                                <input id="complemento" name="complemento" value="<?= $endereco['complemento'] ?>"
                                       type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group ativo" style="margin-top: 30px">
                        <label for="ativo" class="col-md-1 control-label">Ativo:</label>
                        <div class="btn btn-secondary">
                            <?php if ($cliente['ativo'] == 1) { ?>
                                <input id="ativo_cliente" type="checkbox" checked>
                            <?php } else { ?>
                                <input id="ativo_cliente" type="checkbox">
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" style="margin-top: 30px;" class="btn btn-success save-cliente"
                            id="save-cliente">
                        <i class="fa fa-save"></i> Salvar
                    </button>

                    <a class="btn btn-default" href="<?= BASE_URL ?>clientelist" style="margin: 30px 0 0 10px"><i
                                class="fa fa-reply"></i> Voltar</a>

                </form>

            </fieldset>
        </td>
        </tbody>
    </table>
</div>
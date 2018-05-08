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
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="cod_user">Nome:</label>
                        <div class="col-md-9">
                            <input id="nome" name="nome" type="text" placeholder="" class="form-control input-sm" required>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="nome">Telefone:</label>
                        <div class="col-md-4">
                            <input id="telefone" name="telefone" type="text" placeholder=""
                                   class="form-control input-md"
                                   required="">

                        </div>
                        <label class="col-md-1 control-label" for="nome">CPF/CNPJ:</label>
                        <div class="col-md-4">
                            <input id="cpf_cnpj" name="cpf_cnpj" type="text" placeholder=""
                                   class="form-control input-md"
                                   required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="nome">RG:</label>
                        <div class="col-md-2">
                            <input id="rg" name="rg" type="text" placeholder="" class="form-control input-md">
                        </div>

                        <label class="col-md-1 control-label" for="nome">Org/Ex:</label>
                        <div class="col-md-2">
                            <input id="orgaoex" name="orgaoex" type="text" placeholder="" class="form-control input-md">
                        </div>

                        <label class="col-md-1 control-label" for="nome">Nasc:</label>
                        <div class="col-md-3">
                            <input id="nasc" name="nasc" type="date" placeholder="" class="form-control input-md"
                                   required="">
                        </div>
                    </div>

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Dados Endereço</legend>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome"
                                   style="padding-right: 70px;">Mun:</label>
                            <div class="col-md-3">
                                <select id="municipio" name="municipio" class="form-control" required>
                                    <option value=""></option>
                                    <?php if (count($municipios) > 0) {
                                        foreach ($municipios as $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
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
                                            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Rua:</label>
                            <div class="col-md-9">
                                <input id="rua" name="rua" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Bairro:</label>
                            <div class="col-md-6">
                                <input id="bairro" name="bairro" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                            <label class="col-md-1 control-label" for="nome">N°:</label>
                            <div class="col-md-2">
                                <input id="numero" name="numero" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Compl:</label>
                            <div class="col-md-9">
                                <input id="complemento" name="complemento" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" style="margin-top: 30px;" class="btn btn-success save-cliente"
                            id="save-cliente">
                        <i class="fa fa-save"></i> Salvar
                    </button>

                    <a class="btn btn-default" href="<?= BASE_URL ?><?= $voltar ?>" style="margin: 30px 0 0 10px"><i
                                class="fa fa-reply"></i> Voltar</a>

                </form>

            </fieldset>
        </td>
        </tbody>
    </table>
</div>
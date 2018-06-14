<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>usuariolist"">Início</a>
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

        <form id="formulario">

        <td>
            <input type="hidden" id="id" value="<?= $usuario['id'] ?>">
            <label>Nome:</label>
            <input type="text" class="form-control" id="nome" value="<?= $usuario['nome'] ?>" required>

            <label>Login:</label>
            <input type="text" class="form-control" id="login" value="<?= $usuario['login'] ?>" required>

            <label>Senha:</label>
            <input type="password" class="form-control" id="senha" value="<?= $usuario['senha'] ?>" required>
            <span id="msgsenha1">As senhas não conferem</span>

            <label>Confirmar senha:</label>
            <input type="password" class="form-control" id="senhaconfirm" value="<?= $usuario['senha'] ?>" required>
            <span id="msgsenha2">As senhas não conferem</span>

            <label class="col-md-1 control-label">Tipo:</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value=""></option>
                    <?php if (count($tipos) > 0) {
                        foreach ($tipos as $v) { ?>
                            <option value="<?= $v['id'] ?>" <?= ($v['id'] == $usuario['tipo_id']) ? ' selected' : null ?>><?= $v['nome'] ?></option>
                        <?php }
                    } ?>
                </select>

            <div class="form-group" style="margin-top: 30px">
                <label for="ativo">Ativo:</label>
                <div class="btn btn-secondary">
                    <?php if ($usuario['ativo']) { ?>
                        <input id="ativo" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="ativo" type="checkbox">
                    <?php } ?>
                </div>
            </div>

            <button type="submit" style="margin-top: 30px;" class="btn btn-success save-user" id="save-user"><i
                        class="fa fa-save"></i> Salvar
            </button>
            <a class="btn btn-default" href="<?= BASE_URL ?>usuariolist" style="margin: 30px 0 0 10px"><i
                        class="fa fa-reply"></i> Voltar</a>

        </td>
        </form>

        </tbody>
    </table>
</div>
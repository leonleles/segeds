<!-- ORIENTACAO -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= BASE_URL ?>home"">Início</a>
    </li>
    <li class="breadcrumb-item active">Solicitacões</li>
</ol>

<div class="tabela">
    <div class="titulo">Solicitações</div>

    <fieldset>
        <legend>Filtrar por:</legend>

        <form class="opcoes">
            <div class="item">
                <p>Técnico: </p>
                <select class="form-control" id="tecnicos">
                    <option value="0">Todos</option>
                    <?php if (count($tecnicos) > 0) {
                        foreach ($tecnicos as $v) { ?>
                            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
                        <?php }
                    } ?>
                </select>
            </div>

            <div class="item">
                <p>Cliente: </p>
                <select class="form-control" id="clientes">
                    <option value="0">Todos</option>
                    <?php if (count($clientes) > 0) {
                        foreach ($clientes as $v) { ?>
                            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
                        <?php }
                    } ?>
                </select>
            </div>

            <div class="item">
                <p>Serviço: </p>
                <select class="form-control" id="servicos">
                    <option value="0">Todos</option>
                    <?php if (count($servicos) > 0) {
                        foreach ($servicos as $v) { ?>
                            <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
                        <?php }
                    } ?>
                </select>
            </div>

            <div class="item">
                <p>Status: </p>
                <select class="form-control" id="select_status">
                    <option value="">Todos</option>
                    <option value="2">Aberto</option>
                    <option value="3">Em andamento</option>
                    <option value="0">Cancelado</option>
                    <option value="10">Atrasado</option>
                    <option value="1">Concluído</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="filtrar">
                <i class="fa fa-search"></i> Filtrar
            </button>

            <button type="reset" class="btn btn" id="reset">
                <i class="fa fa-refresh"></i></button>
        </form>
    </fieldset>

    <div class="legenda">
        <div class="item"><i></i>
            <p>Aberto</p></div>
        <div class="item"><i class="andamento"></i>
            <p>Em andamento</p></div>
        <div class="item"><i class="concluido"></i>
            <p>Concluído</p></div>
        <div class="item"><i class="atrasado"></i>
            <p>Cancelado ou Atrasado</p></div>
    </div>

    <div class="resultados">
        <table class="table table-bordered table-hover tabelacliente" id="dataTable" width="100%"
               cellspacing="0">
            <thead>
            <tr>
                <th></th>
                <th>Cliente</th>
                <th>Agenda</th>
                <th>Previsão</th>
                <th>Técnico</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="solicitacoes_items">
            </tbody>
        </table>
    </div>
</div>

<div class="popup">
    <div class="container">
        <div class="top">
            <div class="titulo">Ações</div>
            <i class="fa fa-close"></i></div>
        <div class="conteudo">
            <fieldset>
                <legend>Informações</legend>
                <div class="dados">
                    <div class="item">Carregando...</div>
                </div>
            </fieldset>
            <select class="form-control" id="statuspopup">
                <option value="2">Aberto</option>
                <option value="3">Em andamento</option>
                <option value="1">Concluído</option>
                <option value="0">Cancelado</option>
            </select>
            <button class="btn btn-dark" id="alterarstatus">Alterar</button>
        </div>
    </div>
</div>
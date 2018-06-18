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
                <p>Data: </p>
                <input type="date" class="form-control">
            </div>

            <div class="item">
                <p>Técnico: </p>
                <select class="form-control" id="">
                    <option value="">sdadsda</option>
                </select>
            </div>

            <div class="item">
                <p>Cliente: </p>
                <select class="form-control" id="">
                    <option value="">sdadsda</option>
                </select>
            </div>

            <div class="item">
                <p>Serviço: </p>
                <select class="form-control" id="">
                    <option value="">sdadsda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="filtrar">
                <i class="fa fa-search"></i> Filtrar
            </button>

            <button type="reset" class="btn btn" id="filtrar">
                <i class="fa fa-refresh"></i></button>
        </form>
    </fieldset>

    <div class="resultados">
        <table class="table table-bordered tabelacliente" id="dataTable" width="100%"
               cellspacing="0">
            <thead>
            <tr>
                <th></th>
                <th>Cliente</th>
                <th>Agenda</th>
                <th>Previsão</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><i class="andamento"></i></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width: 80px">
                    <i class="fa fa-eye"></i>
                    <i class="fa fa-cog opcoes"></i>
                </td>
            </tr>
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
                    <div class="item"><b>Nome:</b> Leonardo Leles</div>
                    <div class="item"><b>Telefone:</b> (62)9 9159-3277</div>
                    <div class="item"><b>Municipio:</b> Ceres</div>
                    <div class="item"><b>Distrito:</b> Nenhum</div>
                    <div class="item"><b>Endereço:</b> Rua ps 03 - QD T LT 10</div>
                    <div class="item"><b>Complemento:</b> Em frente a rua do estadio</div>
                </div>
            </fieldset>
            <select class="form-control" id="">
                <option value="">Aberto</option>
                <option value="">Em andamento</option>
                <option value="">Concluído</option>
                <option value="">Cancelado</option>
            </select>
            <button class="btn btn-dark">Alterar</button>
        </div>
    </div>
</div>
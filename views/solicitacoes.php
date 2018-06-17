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
        <table  class="table table-bordered tabelacliente" id="dataTable" width="100%"
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
                <td></td>
            </tr>
            <tr>
                <td><i></i></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><i class="atrasado"></i></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><i class="proximo"></i></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
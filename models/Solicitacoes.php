<?php

class Solicitacoes extends Model {

    public function salvar ($dados) {

        $c = new CRUD();
        $a = new Agendamento();
        $res = [];

        if ($dados['id'] != null) {

            $a->editar($dados);

            $valores = "cliente_id = '{$dados['cliente_id']}', servico_id= '{$dados['servico_id']}', ativo = '{$dados['ativo']}'";

            $retorno = $c->Update('solicitacao', $valores, " where id =" . $dados['id']);

            if ($retorno > 0) {
                $res['msg'] = 'Salvo!';
            } else {
                $res['msg'] = 'Salvo!';
            }

        } else {

            $agendamento = $a->salvar($dados);

            $items = "'{$dados['cliente_id']}','{$agendamento}', '{$dados['servico_id']}', '{$dados['ativo']}'";

            $id = $c->Salvar('solicitacao', 'cliente_id, agendamento_id, servico_id, ativo', $items);

            if ($id > 0) {
                $res['id'] = $id;
                $res['msg'] = 'Salvo!';
            }

        }

        return $res;

    }

    /**
     * @param $id
     * @return array
     */
    public function selecionarId ($id) {

        $c = new CRUD();

        $sql = "select s.id,
          s.cliente_id,
          s.servico_id,
          s.ativo,
          a.emissao, 
          a.conclusao, 
          a.agendamento,
          a.previsao,
          a.tecnico_id, 
          a.id as id_agendamento, 
          a.ativo as ativo_agendamento 
          from solicitacao s 
          left join agendamento a on s.agendamento_id = a.id 
          where s.id =";

        $res = $c->Query($sql . $id);

        return $res;

    }

    public function listar () {


    }


    /**
     * @param $cliente_id
     *
     * Maior que 1 será: 2 para aberto e 3 para em andamento
     * Menor que 2 será : 1 para concluido e 0 para cancelado
     *
     * Verifica se cliente já possui uma solicitacao em aberto ou em andamento
     * @return array
     */
    public function verificarCliente ($dados) {

        $c = new CRUD();
        $res = [];

        $sql = "
        SELECT
	      * 
        FROM
	    solicitacao s
	    LEFT JOIN agendamento a ON s.agendamento_id = a.id 
        WHERE
	    s.cliente_id = {$dados['cliente_id']} 
	    AND status > 1 
	    AND a.ativo = 1";

        if ($dados['id_agendamento']) {
            $sql .= " and a.id != {$dados['id_agendamento']}";
        }

        $retorno = $c->Query($sql);

        if (count($retorno) > 0) {
            $res['valor'] = false;
            $res['msg'] = "Já possui uma solicitação em andamento.";
        } else {
            $res['valor'] = true;
            $res['msg'] = "";
        }

        return $res;

    }


    /**
     * @param $dados
     * Verifica disponibilidade de horario e disponibilidade de técnico
     * @return int
     */
    public function verificarHorario ($dados) {

        $c = new CRUD();

        if ($dados['id_agendamento'] != null) {
            $condicao = "WHERE (( previsao > '{$dados['agendamento']}' AND previsao < '{$dados['previsao']}' ) or
	        ( agendamento < '{$dados['previsao']}' AND agendamento > '{$dados['agendamento']}' )) and tecnico_id = {$dados['tecnico_id']}  and id != {$dados['id_agendamento']}";
        } else {
            $condicao = "WHERE (( previsao > '{$dados['agendamento']}' AND previsao < '{$dados['previsao']}' ) or
	        ( agendamento < '{$dados['previsao']}' AND agendamento > '{$dados['agendamento']}' )) and tecnico_id = {$dados['tecnico_id']}";
        }
        $res = $c->Selecionar('*', 'agendamento', $condicao);

        return count($res);

    }

    /**
     * Maior que 1 será: 2 para aberto e 3 para em andamento
     * Menor que 2 será : 1 para concluido e 0 para cancelado
     **/
    public function listarTodos ($dados) {

        $c = new CRUD();

        if ($_SESSION['tipo_id'] > 4) {
            $condicao = " where s.ativo = 1 and a.tecnico_id = {$_SESSION['id']} ";
        } else {
            $condicao = " where s.id > 0 ";
        }

        if (isset($dados['tecnico']) && $dados['tecnico'] != 0 && $dados['tecnico'] != null) {
            $condicao .= " and a.tecnico_id = {$dados['tecnico']}";
        }

        if (isset($dados['cliente']) && $dados['cliente'] != 0 && $dados['cliente'] != null) {
            $condicao .= " and s.cliente_id = {$dados['cliente']}";
        }

        if (isset($dados['servico']) && $dados['servico'] != 0 && $dados['servico'] != null) {
            $condicao .= " and s.servico_id = {$dados['servico']}";
        }

        if (isset($dados['status']) && $dados['status'] != null) {
            if ($dados['status'] > 9) {
                $condicao .= " and NOW() > a.agendamento and a.status = 2 ";
            } else {
                $condicao .= " and a.status = {$dados['status']}";
            }
        }

        $res = $c->Query("select *, s.id as id_solicitacao, u.nome as nome_tecnico, e.nome as nome_cliente from solicitacao s left join agendamento a on s.agendamento_id = a.id left join cliente e on s.cliente_id = e.id left join usuario u on u.id = a.tecnico_id" . $condicao . " order by a.agendamento asc");
        $final = [];

        if (count($res) > 0) {
            foreach ($res as $v) {

                if ($v['status'] == 1) {
                    $v['status'] = 'concluido';
                } else if ($v['status'] == 0) {
                    $v['status'] = 'cancelado';
                } else if ($v['status'] == 2) {
                    if ((int)strtotime($v['agendamento']) < (int)strtotime(date("Y-m-d H:i:s"))) {
                        $v['status'] = "atrasado";
                    } else {
                        $v['status'] = 'aberto';
                    }

                } else if ($v['status'] == 3) {
                    $v['status'] = 'andamento';
                }

                $v['agendamento'] = date("d/m/Y H:i:s", strtotime($v['agendamento']));
                $v['previsao'] = date("d/m/Y H:i:s", strtotime($v['previsao']));

                $final[] = $v;
            }
        }

        return $final;
    }

    //pega o id da solicitação e lista os dados no popup de solicitações

    public function verDados ($id) {

        $c = new CRUD();

        $res = $c->Query("SELECT
	                      *,
	                      m.nome AS municipio,
	                      c.nome AS nome_cliente,
	                      d.nome AS distrito,
	                      a.id as id_agendamento
                      FROM
	                      solicitacao
	                  LEFT JOIN cliente c ON solicitacao.cliente_id = c.id
	                  LEFT JOIN endereco e ON c.endereco_id = e.id
	                  LEFT JOIN municipio m ON e.municipio_id = m.id
	                  LEFT JOIN distrito d ON e.distrito_id = d.id
	                  LEFT JOIN agendamento a ON solicitacao.agendamento_id = a.id 
                      WHERE
	                  solicitacao.id = {$id}
	                  
	                  LIMIT 1
");

        if (count($res) > 0) {
            $res = $res[0];
        }

        return $res;
    }
}
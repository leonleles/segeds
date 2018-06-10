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
    public function verificarCliente ($cliente_id) {

        $c = new CRUD();
        $res = [];

        $agenda_id = $c->Selecionar('*', 'solicitacao', ' where cliente_id=' . $cliente_id);

        if (count($agenda_id) > 0) {

            $status = $c->Selecionar('*', 'agendamento', "where id ={$agenda_id[0]['agendamento_id']} and status > 1");

            if (count($status) > 0) {

                if ($status[0]['status'] == 2) {
                    $res['msg'] = "Já possui solicitação em aberto";
                    $res['valor'] = false;
                } else if ($status[0]['status'] == 3) {
                    $res['msg'] = "Já possui solicitação em andamento";
                    $res['valor'] = false;
                }
            } else {
                $res['msg'] = null;
                $res['valor'] = true;
            }
        } else {
            $res['msg'] = null;
            $res['valor'] = true;
        }

        return $res;

    }
}
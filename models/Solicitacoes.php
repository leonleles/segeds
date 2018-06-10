<?php

class Solicitacoes extends Model {

    public function salvar ($dados) {

        $c = new CRUD();
        $a = new Agendamento();
        $res = [];

        $agendamento = $a->salvar($dados);

        $items = "'{$dados['cliente_id']}','{$agendamento}', '{$dados['servico_id']}', '{$dados['ativo']}'";

        $id = $c->Salvar('solicitacao', 'cliente_id, agendamento_id, servico_id, ativo', $items);

        if ($id > 0) {
            $res['id'] = $id;
            $res['msg'] = 'Salvo!';
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
          a.tecnico_id, 
          a.id as id_agendamento, 
          a.ativo as ativo_agendamento 
          from solicitacao s 
          left join agendamento a on s.agendamento_id = a.id 
          where s.id =";

        $res = $c->Query($sql.$id);

        return $res;

    }

    public function listar () {


    }

    public function verificarHorario () {

    }
}
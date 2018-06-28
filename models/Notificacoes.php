<?php

class Notificacoes extends Model {

    public function listar ($id) {

        $c = new CRUD();

        $sql = "
                SELECT 
                  *,
                agendamento.id as id_agendamento,
                s.id as id_solicitacao
                FROM
	            agendamento
	            LEFT JOIN solicitacao s ON s.agendamento_id = agendamento.id
	            LEFT JOIN cliente c ON s.cliente_id = c.id 
                WHERE
	            agendamento.tecnico_id = {$_SESSION['id']} ";

        if($id != null){
            $condicao = " and agendamento.id > {$id} ";
        }else{
            $condicao = "";
        }

        $res = $c->Query($sql.$condicao." ORDER BY agendamento.agendamento");

        $final = [];

        if (count($res) > 0) {
            foreach ($res as $v) {
                $data = date('d-m-Y', strtotime($v['agendamento']));
                if (strtotime($data) == strtotime(date("d-m-Y"))) {
                    $v['agendamento'] = date("d/m/Y H:i:s", strtotime($v['agendamento']));
                    $final[] = $v;
                }
            }
        }

        return $final;
    }

    public function inserir($dados){

        $c = new CRUD();

        $valores = "'{$dados['mensagem']}', '{$dados['agendamento_id']}', '{$_SESSION['id']}', '{$dados['user']}'";

        $id = $c->Salvar('notificacoes', 'mensagem, agendamento_id, usuario_id, user_id', $valores);

        return $id;

    }

    public function notifica($id){

        $c = new CRUD();

        $sql = "
                SELECT
	n.*,
	a.emissao,
	s.id as id_solicitacao
FROM
	notificacoes n
	LEFT JOIN agendamento a ON a.id = n.agendamento_id 
	LEFT JOIN solicitacao s on s.agendamento_id = a.id
	             ";

        if($id != null){
            $condicao = " where n.id > {$id} ";
        }else{
            $condicao = "";
        }

        $res = $c->Query($sql.$condicao." ORDER BY n.id");

        return $res;

    }
}
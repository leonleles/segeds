<?php

class Agendamento extends Model {

    /**
     * @param $dados
     * @return array
     */
    public function salvar ($dados) {

        $c = new CRUD();

        date_default_timezone_set('America/Sao_Paulo');
        $emissao = date('Y-m-d H:i');

        $items = "'{$emissao}','{$dados['agendamento']}', '{$dados['tecnico_id']}', '{$dados['ativo']}'";

        $res = $c->Salvar('agendamento', 'emissao, agendamento, tecnico_id, ativo', $items);

        return $res;

    }

    public function editar ($dados) {

        $c = new CRUD();

        $valores = "agendamento = '{$dados['agendamento']}', tecnico_id= '{$dados['tecnico_id']}', ativo = '{$dados['ativo']}'";

        $res = $c->Update('agendamento', $valores, " where id = ".$dados['id_agendamento']);

        return $res;

    }

    public function listar () {


    }
}
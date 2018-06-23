<?php

class Agendamento extends Model {

    /**
     * @param $dados
     * @return array
     */
    public function salvar ($dados) {

        $c = new CRUD();

        date_default_timezone_set('America/Sao_Paulo');
        $emissao = date('Y-m-d H:i:s');

        $items = "'{$emissao}','{$dados['agendamento']}', '{$dados['previsao']}', '{$dados['tecnico_id']}', '{$dados['ativo']}'";

        $res = $c->Salvar('agendamento', 'emissao, agendamento, previsao, tecnico_id, ativo', $items);

        return $res;

    }

    public function editar ($dados) {

        $c = new CRUD();

        $valores = "agendamento = '{$dados['agendamento']}', previsao = '{$dados['previsao']}', tecnico_id= '{$dados['tecnico_id']}', ativo = '{$dados['ativo']}'";

        $res = $c->Update('agendamento', $valores, " where id = ".$dados['id_agendamento']);

        return $res;

    }

    //altera o status apartir do id enviado pelo popup
    public function alterarstatus ($dados) {

        $c = new CRUD();
        $fim = [];

        $agenda = $c->Selecionar("*", "agendamento", " where id={$dados['id']}")[0];

        if(strtotime($agenda['agendamento']) < strtotime(date('Y-m-d H:i:s', strtotime("-15 minutes",strtotime(date('Y-m-d H:i:s')))))){

            if($dados['status'] > 0){
                $fim['msg'] = "É necessário reagendar para concluir essa ação.";
            }else{
                $valores = "status = '{$dados['status']}'";
                $s = $c->Update("agendamento", $valores, " where id =".$dados['id']);
                if($s > 0){
                    $fim['msg'] = "Salvo.";
                }
            }

        }else{
            $fim['msg'] = "else";
        }

        return $fim;

    }
}
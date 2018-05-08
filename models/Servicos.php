<?php

class Servicos extends Model {

    public function salvar ($dados) {

        $c = new CRUD();

        $res = [];

        $condicao = " WHERE nome = '" . $dados['nome'] . "'";
        $verifica = $c->Selecionar('*', 'servico', $condicao);

        if (count($verifica) > 0) {

            $res['msg'] = 'Registro com nome existe!';

        } else {

            $dados = "'{$dados['nome']}', '{$dados['ativo']}'";

            $id = $c->Salvar('servico', 'nome, ativo', $dados);

            if ($id > 0) {
                $res['id'] = $id;
                $res['msg'] = 'Salvo!';
            }
        }

        return $res;


    }

    public function editar ($dados) {

        $c = new CRUD();

        $res = [];

        $valores = "ativo = '{$dados['ativo']}', nome = '{$dados['nome']}'";

        $id = $c->Update('servico', $valores, " WHERE id = {$dados['id']}");

        if ($id > 0) {
            $res['msg'] = 'Salvo!';
        } else {
            $res['msg'] = 'Altere o registro para salvar!';
        }

        return $res;


    }

    public function listar () {

        $c = new CRUD();

        $res = $c->Selecionar('*', 'servico', ' order by nome');

        if (count($res) > 0) {
            foreach ($res as $i => $v) {
                if ($res[$i]['ativo'] == 1) {
                   $res[$i]['ativo'] = "Sim";
                }else{
                    $res[$i]['ativo'] = "Não";
                }
            }
        }

        return $res;

    }
}
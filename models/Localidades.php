<?php

class Localidades extends Model {

    public function salvar ($nome) {

        $c = new CRUD();

        $condicao = " WHERE nome = '" . $nome . "'";
        $verifica = $c->Selecionar('*', 'municipio', $condicao);

        if (count($verifica) > 0) {

            $res = 'duplicate';

        } else {

            $dados = "'{$nome}'";

            $res = $c->Salvar('municipio', 'nome', $dados);
        }

        return $res;

    }

    public function listarTodos () {

        $c = new CRUD();

        $res = $c->Selecionar('*', 'municipio', 'order by nome ASC');

        return $res;

    }

    public function salvarDistritos ($dados) {

        $c = new CRUD();

        $final = [];

        foreach ($dados as $i => $v) {

            if ($v['id'] == null && $v['id'] == "") {

                $dados = "'{$v['nome']}', '{$v['municipio']}', '{$v['ativo']}'";

                $res = $c->Salvar('distrito', 'nome, municipio_id, ativo', $dados);

                $final[$i]['id'] = $res;

            } else {

                $valores = "ativo = '{$v['ativo']}'";

                $res = $c->Update('distrito', $valores, " WHERE id = {$v['id']}");

                $final[$i]['id'] = $res;
            }

        }

        return $final;
    }

    public function selecionaDistritos ($id) {


        $c = new CRUD();

        $condicao = ' WHERE municipio_id = ' . $id . ' order by nome asc';

        $res = $c->Selecionar('*', 'distrito', $condicao);

        return $res;

    }

    public function editMunicipio($dados){

        $c = new CRUD();

        $valores = "ativo = '{$dados['ativo']}', nome = '{$dados['nome']}'";

        $res = $c->Update('municipio', $valores, " WHERE id = {$dados['id']}");

        return $res;

    }

    public function editDistrito($dados){

        $c = new CRUD();

        $valores = "ativo = '{$dados['ativo']}', nome = '{$dados['nome']}', municipio_id = '{$dados['municipio']}'";

        $res = $c->Update('distrito', $valores, " WHERE id = {$dados['id']}");

        return $res;

    }

    public function municipiosAtivos(){

        $c = new CRUD();

        $res = $c->Selecionar('*', 'municipio', 'where ativo = 1 order by nome ASC');

        return $res;


    }

}
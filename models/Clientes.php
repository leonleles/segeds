<?php

class Clientes extends Model {

    public function salvar ($dados) {

        $c = new CRUD();

        $condicao = " WHERE cpf = '" . $dados['cpf_cnpj'] . "'";
        $verifica = $c->Selecionar('*', 'cliente', $condicao);

        if (count($verifica) > 0) {
            $res = 0;
        } else {

            //salvar endereco
            $valores = "'{$dados['rua']}', '{$dados['bairro']}', '{$dados['numero']}', '{$dados['distrito']}', '{$dados['complemento']}', '{$dados['municipio']}'";

            $id_endereco = $c->Salvar('endereco', 'rua, bairro, numero, distrito_id, complemento, municipio_id', $valores);

            //salva cliente
            $valoress = "'{$dados['nome']}', '{$dados['telefone']}', '{$dados['cpf_cnpj']}', '{$dados['nasc']}', '{$id_endereco}', '{$dados['rg']}','{$dados['orgaoex']}'";
            $res = $c->Salvar('cliente', 'nome, telefone, cpf, data_nascimento, endereco_id, rg, orgaoex', $valoress);
        }
        return $res;
    }

    public function editar ($dados) {

        $c = new CRUD();

        $condicao = " WHERE cpf = '" . $dados['cpf_cnpj'] . "' and id != {$dados['id']}";
        $verifica = $c->Selecionar('*', 'cliente', $condicao);

        if (count($verifica) > 0) {
            $res['msg'] = "Não salvo! CPF/CNPJ em uso em outro registro.";
        } else {


            //salvar endereco
            $valores = "rua ='{$dados['rua']}', bairro ='{$dados['bairro']}', numero ='{$dados['numero']}', distrito_id='{$dados['distrito']}', complemento='{$dados['complemento']}', municipio_id='{$dados['municipio']}'";

            $c->Update('endereco', $valores, ' WHERE id=' . $dados['id_endereco']);

            //salva cliente
            $valoress = "nome='{$dados['nome']}', telefone='{$dados['telefone']}', cpf='{$dados['cpf_cnpj']}', data_nascimento='{$dados['nasc']}', rg='{$dados['rg']}', orgaoex='{$dados['orgaoex']}', ativo='{$dados['ativo']}'";
            $c->Update('cliente', $valoress, ' WHERE id=' . $dados['id']);

            $res['msg'] = "Salvo!";

        }

        return $res;
    }

    public function selecionarId ($id) {

        $c = new CRUD();

        $res = $c->Query('SELECT cliente.*, endereco.municipio_id, endereco.distrito_id FROM cliente INNER JOIN endereco ON cliente.endereco_id = endereco.id WHERE cliente.id =' . $id);

        return $res;

    }

    public function Listar ($ativos = false) {

        $c = new CRUD();

        if ($ativos == false) {
            $clientes = $c->Selecionar('*', 'cliente');
        }else{
            $clientes = $c->Selecionar('*', 'cliente', " where ativo = 1");
        }

        return $clientes;

    }

}
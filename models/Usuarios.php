<?php

class Usuarios extends Model {
    public function login ($user, $pass) {

        $return = array();

        $sql = "SELECT * FROM usuario WHERE login = ? AND senha = ? AND ativo = ?";
        $sql = $this->db->prepare($sql);

        $sql->execute([$user, $pass, 1]);

        if ($sql->rowCount() > 0) {
            $user = $sql->fetch();

            $c = new CRUD();

            $_SESSION['login'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['tipo_id'] = $user['tipo_id'];
            $_SESSION['tipo_nome'] = $c->Selecionar("nome", "tipo_usuario", " where id =" . $user['tipo_id'])[0]['nome'];

            $return['condicao'] = true;
            $return['msg'] = "Usuário logado com sucesso";
        } else {
            $return['condicao'] = false;
            $return['msg'] = "E-mail ou Senha Incorretos!";
        }

        return $return;
    }

    public function salvar ($dados) {

        $c = new CRUD();

        $res = [];

        if ($dados['id'] == null || $dados['id'] == "") {

            $condicao = " WHERE login = '" . $dados['login'] . "'";
            $verifica = $c->Selecionar('*', 'usuario', $condicao);

            if (count($verifica) > 0) {

                $res['msg'] = 'Registro com login existe!';

            } else {

                $dados = "'{$dados['nome']}', '{$dados['login']}', '{$dados['senha']}', '{$dados['tipo_id']}', '{$dados['ativo']}'";

                $id = $c->Salvar('usuario', 'nome, login, senha, tipo_id, ativo', $dados);

                if ($id > 0) {
                    $res['id'] = $id;
                    $res['msg'] = 'Salvo!';
                }
            }

        } else {

            $condicao = " WHERE login = '" . $dados['login'] . "' and id != {$dados['id']}";
            $verifica = $c->Selecionar('*', 'usuario', $condicao);

            if (count($verifica) > 0) {

                $res['msg'] = 'Não foi possível salvar. Este login já pertence a outro registro!';

            } else {

                $valores = "nome = '{$dados['nome']}', login ='{$dados['login']}', senha ='{$dados['senha']}', tipo_id ='{$dados['tipo_id']}', ativo='{$dados['ativo']}'";

                $id = $c->Update('usuario', $valores, " WHERE id = {$dados['id']}");

                if ($id > 0) {
                    $res['msg'] = 'Salvo!';
                } else {
                    $res['msg'] = 'Altere o registro para salvar!';
                }
            }

        }

        return $res;


    }

    public function listar () {

        $c = new CRUD();

        $condicao = "";

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 1) {
            $condicao .= " where tipo_id != 1";
        }

        $res = $c->Selecionar('*', 'usuario', $condicao . ' order by nome');

        if (count($res) > 0) {
            foreach ($res as $i => $v) {
                if ($res[$i]['ativo'] == 1) {
                    $res[$i]['ativo'] = "Sim";
                } else {
                    $res[$i]['ativo'] = "Não";
                }

                $res[$i]['tipo'] = $c->Selecionar("nome", "tipo_usuario", " WHERE id=" . $v['tipo_id'])[0]['nome'];
            }
        }

        return $res;

    }

    public function listarTipo ($id) {

        $c = new CRUD();

        $res = $c->Selecionar('*', 'usuario', " WHERE tipo_id={$id} order by nome");

        return $res;

    }
}
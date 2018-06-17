<?php

class ajaxUsuarioController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'salvar':

                $user = new Usuarios();

                $res = $user->salvar($dados);

                echo json_encode($res);

                break;

            case "login":

                $user = new Usuarios();

                $res = $user->login($dados['login'], $dados['senha']);

                echo json_encode($res);


                break;

            case "logout":

                session_destroy();
                echo json_encode(1);

                break;
        }

    }
}
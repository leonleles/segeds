<?php

class ajaxNotificacoesController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'listar':

                $n = new Notificacoes();

                $res = $n->listar($dados['id']);

                echo json_encode($res);

                break;
        }

    }
}
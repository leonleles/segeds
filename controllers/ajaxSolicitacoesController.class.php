<?php

class ajaxSolicitacoesController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'listartodos':

                $s = new Solicitacoes();

                $res = $s->listarTodos();

                echo json_encode($res);

                break;
        }

    }
}
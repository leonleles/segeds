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

                if (isset($dados)) {
                    $valores = $dados;
                } else {
                    $valores = [];
                }

                $res = $s->listarTodos($valores);

                echo json_encode($res);

                break;

            case "verdados":

                $s = new Solicitacoes();

                $res = $s->verDados($dados['id']);

                echo json_encode($res);

                break;

            case "alterarstatus":

                $a = new Agendamento();

                $res = $a->alterarstatus($dados);

                echo json_encode($res);

                break;
        }

    }
}
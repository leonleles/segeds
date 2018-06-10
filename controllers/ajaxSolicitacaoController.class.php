<?php

class ajaxSolicitacaoController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'salvar':

                $l = new Solicitacoes();

                $res = $l->salvar($dados);

                echo json_encode($res);

                break;

            case 'verificarcliente':

                $l = new Solicitacoes();

                $res = $l->verificarCliente($dados['cliente_id']);

                echo json_encode($res);

                break;
        }

    }
}
<?php

class ajaxClienteController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'salvarcliente':

                $l = new Clientes();

                $res = $l->salvar($dados);

                echo json_encode($res);

                break;
            case 'editarcliente':

                $l = new Clientes();

                $res = $l->editar($dados);

                echo json_encode($res);

                break;
        }

    }
}
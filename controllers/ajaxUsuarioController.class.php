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

                $l = new Servicos();

                $res = null;

                if ($dados['id'] > 0 && $dados['id'] != null) {

                    $res = $l->editar($dados);

                } else {

                    $res = $l->salvar($dados);

                }

                echo json_encode($res);

                break;
        }

    }
}
<?php

class ajaxController extends Controller {

    public function index () {
        if (isset($_POST['acao'])) {
            $acao = addslashes($_POST['acao']);

            if (isset($_POST['dados'])) {
                $dados = $_POST['dados'];
            }
        }

        switch ($acao) {
            case 'salvarMunicipio':

                $l = new Localidades();

                $res = $l->salvar($dados['nome']);

                echo json_encode($res);

                break;

            case 'salvarDistrito':

                $l = new Localidades();

                $res = $l->salvarDistritos($dados['distritos']);

                echo json_encode($res);

                break;

            case 'carregardistritos':


                $l = new Localidades();

                $res = $l->selecionaDistritos($dados['id']);

                echo json_encode($res);


                break;

            case 'editarMunicipio':

                $l = new Localidades();

                $res = $l->editMunicipio($dados);

                echo json_encode($res);


                break;

            case 'editarDistrito':

                $l = new Localidades();

                $res = $l->editDistrito($dados);

                echo json_encode($res);

                break;
        }

    }
}
<?php

class clientenewController extends Controller {

    public function index() {
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $l = new Localidades();

        $dados['voltar'] = $_GET['s'];

        $dados['municipios'] = $l->municipiosAtivos();

        if(count($dados['municipios']) > 0) {
            $dados['distritos'] = $l->selecionaDistritos($dados['municipios'][0]['id']);
        }else{
            $dados['distritos'] = null;
        }



        $this->setCss('assets/css/clientenew.css');
        $this->setJs('assets/libs/jquery/jquery.mask.js');
        $this->setJs('assets/js/clientenew.js');

        $this->loadTemplate('clientenew', $dados);

    }
}
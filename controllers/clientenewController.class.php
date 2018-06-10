<?php

class clientenewController extends Controller {

    public function index() {
        $dados = array();

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
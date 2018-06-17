<?php

class servicoslistController extends Controller {

    public function index () {
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $s = new Servicos();

        $dados['servicos'] = $s->listar();


        $this->setCss('assets/css/servicoslist.css');
        $this->setJs('assets/js/servicoslist.js');

        $this->loadTemplate('servicoslist', $dados);
    }

}
<?php

class municipioeditController extends Controller {

    public function index() {
        $dados = array();

        $c = new CRUD();

        $res = $c->Selecionar('*', 'municipio', ' WHERE id='.$_GET['id']);

        $dados['municipio'] = $res;

        $this->setCss('assets/css/municipioedit.css');
        $this->setJs('assets/js/municipioedit.js');

        $this->loadTemplate('municipioedit', $dados);

    }
}
<?php

class municipioeditController extends Controller {

    public function index() {
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $c = new CRUD();

        $res = $c->Selecionar('*', 'municipio', ' WHERE id='.$_GET['id']);

        $dados['municipio'] = $res;

        $this->setCss('assets/css/municipioedit.css');
        $this->setJs('assets/js/municipioedit.js');

        $this->loadTemplate('municipioedit', $dados);

    }
}
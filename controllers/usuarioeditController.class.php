<?php

class usuarioeditController extends Controller {

    public function index () {
        $dados = array();
        $c = new CRUD();

        $id = $_GET['id'];

        if($id != null){
            $dados['servico'] = $c->Selecionar('*', 'servico', ' WHERE id =' . $id)[0];
        }else{
            $dados['servico']['id'] = null;
            $dados['servico']['nome'] = null;
            $dados['servico']['ativo'] = null;
        }

        $this->setCss('assets/css/usuarioedit.css');
        $this->setJs('assets/js/usuarioedit.js');

        $this->loadTemplate('usuarioedit', $dados);
    }

}
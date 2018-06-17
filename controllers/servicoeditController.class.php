<?php

class servicoeditController extends Controller {

    public function index () {
        $dados = array();
        $c = new CRUD();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $id = (!empty($_GET['id'])) ? $_GET['id'] : null;

        if($id != null){
            $dados['servico'] = $c->Selecionar('*', 'servico', ' WHERE id =' . $id)[0];
        }else{
            $dados['servico']['id'] = null;
            $dados['servico']['nome'] = null;
            $dados['servico']['ativo'] = null;
        }

        $this->setCss('assets/css/servicoedit.css');
        $this->setJs('assets/js/servicoedit.js');

        $this->loadTemplate('servicoedit', $dados);
    }

}
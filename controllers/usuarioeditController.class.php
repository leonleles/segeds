<?php

class usuarioeditController extends Controller {

    public function index () {
        $dados = array();
        $c = new CRUD();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $id = (!empty($_GET['id'])) ? $_GET['id'] : null;

        if($id != null){
            $dados['usuario'] = $c->Selecionar('*', 'usuario', ' WHERE id =' . $id)[0];
        }else{
            $dados['usuario']['id'] = null;
            $dados['usuario']['nome'] = null;
            $dados['usuario']['login'] = null;
            $dados['usuario']['senha'] = null;
            $dados['usuario']['ativo'] = null;
            $dados['usuario']['tipo_id'] = null;
        }

        $dados['tipos'] = $c->Selecionar('*', 'tipo_usuario');

        $this->setCss('assets/css/usuarioedit.css');
        $this->setJs('assets/js/usuarioedit.js');

        $this->loadTemplate('usuarioedit', $dados);
    }

}
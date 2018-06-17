<?php

class perfilController extends Controller {

    public function index () {
        $dados = array();
        $c = new CRUD();

        $id = (!empty($_SESSION['id'])) ? $_SESSION['id'] : null;

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
        $this->setJs('assets/js/perfil.js');

        $this->loadTemplate('perfil', $dados);
    }

}
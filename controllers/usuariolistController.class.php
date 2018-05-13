<?php

class usuariolistController extends Controller {

    public function index () {
        $dados = array();

        $s = new Usuarios();

        $dados['usuarios'] = $s->listar();

        $this->setCss('assets/css/usuariolist.css');
        $this->setJs('assets/js/usuariolist.js');

        $this->loadTemplate('usuariolist', $dados);
    }

}
<?php

class usuariolistController extends Controller {

    public function index () {
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 3) {
            header('Location:'.BASE_URL."home");
        }

        $s = new Usuarios();

        $dados['usuarios'] = $s->listar();

        $this->setCss('assets/css/usuariolist.css');
        $this->setJs('assets/js/usuariolist.js');

        $this->loadTemplate('usuariolist', $dados);
    }

}
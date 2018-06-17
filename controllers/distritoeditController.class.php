<?php

class distritoeditController extends Controller {

    public function index() {
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $c = new CRUD();
        $l = new Localidades();

        $res = $c->Selecionar('*', 'distrito', ' WHERE id ='.$_GET['id']);

        $dados['distrito'] = $res[0];

        $res = $l->listarTodos();

        $dados['municipios'] = $res;


        $this->setCss('assets/css/distritoedit.css');
        $this->setJs('assets/js/distritoedit.js');

        $this->loadTemplate('distritoedit', $dados);

    }
}
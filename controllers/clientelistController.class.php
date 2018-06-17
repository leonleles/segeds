<?php

class clientelistController extends Controller{

	public function index(){
        $dados = array();

        if (!empty($_SESSION) && $_SESSION['tipo_id'] > 4) {
            header('Location:'.BASE_URL."home");
        }

        $l = new Clientes();

        $dados['clientes'] = $l->Listar();


	    $this->setCss('assets/css/clientelist.css');
	    $this->setJs('assets/js/clientelist.js');
		$this->loadTemplate('clientelist', $dados);
	}

}
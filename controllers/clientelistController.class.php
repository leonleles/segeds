<?php

class clientelistController extends Controller{

	public function index(){
        $dados = array();

        $l = new Clientes();

        $dados['clientes'] = $l->Listar();


	    $this->setCss('assets/css/clientelist.css');
	    $this->setJs('assets/js/clientelist.js');
		$this->loadTemplate('clientelist', $dados);
	}

}
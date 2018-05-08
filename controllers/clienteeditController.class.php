<?php

class clienteeditController extends Controller {

    public function index() {
        $dados = array();
        $l = new Localidades();
        $c = new Clientes();
        $e = new Enderecos();

        $id = $_GET['id'];

        //seleciona cliente
        $dados['cliente'] = $c->selecionarId($id)[0];

        $dados['municipios'] = $l->municipiosAtivos();

        //seleciona distrito
        $dados['distritos'] = $l->selecionaDistritos($dados['cliente']['municipio_id']);
        array_unshift($dados['distritos'], ['id'=> 1, 'nome'=>'Nenhum']);

        $dados['endereco'] = $e->selecionarId($dados['cliente']['endereco_id'])[0];

        $this->setCss('assets/css/clienteedit.css');
        $this->setJs('assets/libs/jquery/jquery.mask.js');
        $this->setJs('assets/js/clienteedit.js');

        $this->loadTemplate('clienteedit', $dados);

    }
}
<?php

class solicitacoesController extends Controller {

    public function index () {
        $dados = array();
        $c = new Clientes();
        $s = new Servicos();
        $user = new Usuarios();

        $dados['clientes'] = $c->Listar(true);
        $dados['servicos'] = $s->listar(true);
        $dados['tecnicos'] = $user->listarTipo(Ids::TECNICO);

        $this->setCss('assets/css/solicitacoes.css');
        $this->setJs('assets/js/solicitacoes.js');

        $this->loadTemplate('solicitacoes', $dados);
    }

}
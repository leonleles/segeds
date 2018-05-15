<?php

class solicitacaoController extends Controller {

    public function index() {
        $dados = array();
        $i = new Ids();
        $c = new Clientes();
        $s = new Servicos();
        $user = new Usuarios();

        $dados['clientes'] = $c->Listar();
        $dados['servicos'] = $s->listar();
        $dados['tecnicos'] = $user->listarTipo(Ids::TECNICO);


        $dados['solicitacao']['ativo'] = null;
        $dados['solicitacao']['cliente_id'] = null;
        $dados['solicitacao']['servico_id'] = null;
        $dados['solicitacao']['tecnico_id'] = null;

        $this->setCss('assets/css/solicitacao.css');
        $this->setJs('assets/js/solicitacao.js');
        $this->loadTemplate('solicitacao', $dados);

    }
}
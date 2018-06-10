<?php

class solicitacaoController extends Controller {

    public function index() {
        $dados = array();
        $i = new Ids();
        $c = new Clientes();
        $s = new Servicos();
        $user = new Usuarios();
        $so = new Solicitacoes();


        $dados['solicitacao']['ativo'] = null;
        $dados['solicitacao']['cliente_id'] = null;
        $dados['solicitacao']['servico_id'] = null;
        $dados['solicitacao']['tecnico_id'] = null;

        if(isset($_GET['id']) && $_GET['id'] != null){
            $dados['solicitacao'] = $so->selecionarId($_GET['id'])[0];
            $dados['solicitacao']['data'] = date("Y-m-d", strtotime($dados['solicitacao']['agendamento']));
            $dados['solicitacao']['hora'] = date("H:i", strtotime($dados['solicitacao']['agendamento']));
        }

        $dados['clientes'] = $c->Listar();
        $dados['servicos'] = $s->listar();
        $dados['tecnicos'] = $user->listarTipo(Ids::TECNICO);

        $this->setCss('assets/css/solicitacao.css');
        $this->setJs('assets/js/solicitacao.js');
        $this->loadTemplate('solicitacao', $dados);

    }
}
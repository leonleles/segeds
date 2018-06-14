<?php

class solicitacaoviewController extends Controller {

    public function index() {
        $dados = array();
        $i = new Ids();
        $c = new Clientes();
        $s = new Servicos();
        $user = new Usuarios();
        $so = new Solicitacoes();

        //inicializa variaveis
        $dados['solicitacao']['ativo'] = null;
        $dados['solicitacao']['cliente_id'] = null;
        $dados['solicitacao']['servico_id'] = null;
        $dados['solicitacao']['tecnico_id'] = null;
        $dados['solicitacao']['id'] = null;
        $dados['solicitacao']['id_agendamento'] = null;
        $dados['solicitacao']['data'] = null;
        $dados['solicitacao']['hora'] = null;
        $dados['solicitacao']['data_previsao'] = null;
        $dados['solicitacao']['hora_previsao'] = null;

        if(isset($_GET['id']) && $_GET['id'] != null){
            $dados['solicitacao'] = $so->selecionarId($_GET['id'])[0];
            //dados de agendamento
            $dados['solicitacao']['data'] = date("Y-m-d", strtotime($dados['solicitacao']['agendamento']));
            $dados['solicitacao']['hora'] = date("H:i", strtotime($dados['solicitacao']['agendamento']));
            //dados de previsao
            $dados['solicitacao']['data_previsao'] = date("Y-m-d", strtotime($dados['solicitacao']['previsao']));
            $dados['solicitacao']['hora_previsao'] = date("H:i", strtotime($dados['solicitacao']['previsao']));
        }

        $dados['clientes'] = $c->Listar(true);
        $dados['servicos'] = $s->listar(true);
        $dados['tecnicos'] = $user->listarTipo(Ids::TECNICO);

        $this->setCss('assets/css/solicitacao.css');
//        $this->setJs('assets/js/solicitacao.js');
        $this->loadTemplate('solicitacaoview', $dados);

    }
}
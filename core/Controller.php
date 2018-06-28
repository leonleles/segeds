<?php

class Controller {

    private $css = array();
    private $js = array();

    public function loadView ($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/' . $viewName . '.php';

    }

    public function loadTemplate ($viewName, $viewData = array()) {
        if (!empty($_SESSION['login'])) {
            require 'views/index.php';
        }else{
            require 'views/login.php';
        }

    }

    public function loadViewInTemplate ($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/' . $viewName . '.php';
    }

    public function setCss ($css) {
        $this->css[] = $css;
    }

    public function setJs ($js) {
        $this->js[] = $js;
    }

    public function verificaLogin () {
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('Location: ' . BASE_URL . 'solicitacoes');
            exit;
        }
    }
}
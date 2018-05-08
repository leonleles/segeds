<?php

class Controller {

    private $css = array();
    private $js = array();

    public function loadView ($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/' . $viewName . '.php';

    }

    public function loadTemplate ($viewName, $viewData = array()) {
        require 'views/index.php';
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
            header('Location: ' . BASE_URL . 'home');
            exit;
        }
    }
}
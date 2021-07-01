<?php

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            //print_r($this->());
            $url = $this->getUrl();

            //procura em 'controllers' pelo priemiro vlaor, ucwords capitaliza primeira letra
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController =  ucwords($url[0]);
                unset($url[0]);
                //$baz = ucwords($this, "|");  
            }

            //requer o controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            //checa a segunda parte da URL
            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //pegar parametros
            $this->params = $url ? array_values($url) : [];

            //chamar callback com um array de params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url']. '/');
                //permite filtrar variaveis como uma string/numeor
                $url = filter_var($url, FILTER_SANITIZE_URL);
                //Quebra em um array
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>
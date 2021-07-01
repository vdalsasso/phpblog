<?php
    //carregar model e view
    class Controller {
        public function model ($model) {
            //requer arquivo do model
            require_once '../app/models/' . $model . '.php';
            //istanciar arquivo de model
            return new $model();
        }

        //Carrega a view (checa por arquivo)
        public function view ($view, $data = []) {
        /*
        if(file_exists('../app/views' . $view . '.php')) {
            require_once '../app/views' . $view . '.php';
        */
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View nao existe");
            }
        }
    }

?>
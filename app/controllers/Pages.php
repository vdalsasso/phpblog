<?php

class Pages extends Controller{
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {

        //printar lista de usuarios
        //$users = $this->userModel->getUsers();

        //echo "Home page";
        $data = [
            'title' => 'Home Page',
            //'users' => $users
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }
}

?>

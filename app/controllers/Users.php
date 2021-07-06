<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Processa form
        // Sanitizar POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Digite um nome de usuário.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Nome pode conter apenas números e ltras.';
            }

            //Validar email
            if (empty($data['email'])) {
                $data['emailError'] = 'Informe um endereço de e-mail.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Digite o formato correto.';
            } else {
                //Checar se email existe.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email já está sendo utilizado.';
                }
            }

           // Validar senha em seu tamanho, valores numéricos
            if(empty($data['password'])){
              $data['passwordError'] = 'Informe uma senha.';
            } elseif(strlen($data['password']) < 8){
              $data['passwordError'] = 'Senha precisa ter pelo menos 8 caracteres.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Senha precisa ter pelo menos um valor numérico.';
            }

            //Validar confirmação de senha
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Digite uma senha.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Senhas não combinam, tente novamente.';
                }
            }

            // Se certificar que não há erros
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash senha
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Registrar usuario

                if ($this->userModel->register($data)) {
                    //Redirecionar para a página de login
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Algo deu errado.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Checar pelo post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitizar post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validar username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Informe um nome de usuário.';
            }

            //Validar senha
            if (empty($data['password'])) {
                $data['passwordError'] = 'Informe uma senha.';
            }

            //Checar se não há erros
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Senha ou nome de usuário incorreto.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }
}
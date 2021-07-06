<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $posts = $this->postModel->findAllPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function create() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'O título do post não pode ficar vazio';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'O corpo do post nao pode ficar vazio';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->postModel->addPost($data)) {
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Algo deu errado, tente novamente!");
                }
            } else {
                $this->view('posts/create', $data);
            }
        }

        $this->view('posts/create', $data);
    }

    public function update($id) {

        
        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];



        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->view('posts/update', $data);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'post' => $post,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'O título não pode ficar vazio.';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'A descrição não pode ficar vazia.';
            }

            if($data['title'] == $this->postModel->findPostById($id)->title) {
                $data['titleError'] == 'Pelo menos mude o título!';
            }

            if($data['body'] == $this->postModel->findPostById($id)->body) {
                $data['bodyError'] == 'Pelo menos mude a descrição!';
            }

            die("Algo deu errado, tente novamente!");

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->postModel->updatePost($data)) {
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Algo deu errado, tente novamente!");
                }
            } else {
                $this->view('posts/update', $data);
            }
        } 

        $this->view('posts/update', $data);
    }

    public function delete($id) {

        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->postModel->deletePost($id)) {
                    header("Location: " . URLROOT . "/posts");
            } else {
               die('Algo deu errado!');
            }
        }
    }
}
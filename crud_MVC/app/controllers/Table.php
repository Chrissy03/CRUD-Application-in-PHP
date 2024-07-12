<?php

class Table extends Controller
{
    private $postModel;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('pages/index');
        }

        $this->postModel = $this->model("Db_user");
    }

    public function index()
    {
        $db_users = $this->postModel->getDb_users();

        $data = [
            'title' => 'Table of users',
            'description' => '<br>',
            'db_users' => $db_users
        ];
        $this->view('table/index', $data);
    }

}
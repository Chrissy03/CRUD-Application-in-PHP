<?php


class pages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        if(isLoggedIn()){
            redirect("table");
        }

        $data = [
            "title" => "Welcome",
            'description' => 'Login to get started',
        ];

        $this->view('pages/index', $data);
    }
}
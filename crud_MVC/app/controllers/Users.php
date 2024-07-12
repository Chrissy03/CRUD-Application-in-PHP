<?php
class Users extends Controller
{
    private $postModel;
    public function __construct()
    {

        $this->postModel = $this->model("Db_user");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
                'title' => 'Login',
            ];

            if (empty($data['username'])) {
                $data['username_err'] = "Please enter username!";
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password!";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters!";
            }

            if ($this->postModel->findUserByUsername($data['username'])) {
            } else {
                $data['username_err'] = 'No user found';
            }

            if (empty($data["username_err"]) && empty($data["password_err"])) {
                $loggedInUser = $this->postModel->loginUser($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    redirect('table/index');
                } else {

                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {

                $this->view('users/login', $data);
            }


        } else {
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
                'title' => 'Login',
            ];


            $this->view('users/login', $data);
        }

    }
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['role'] = $user->role;

        flash('login_success', 'You have successfully logged in');
        redirect('table');

    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        redirect('pages/index');
    }
}
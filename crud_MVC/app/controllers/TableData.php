<?php

class TableData extends Controller
{
    private $postModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('pages/index');
        }

        $this->postModel = $this->model("Db_user");
    }

    public function adduser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'first_name_err' => '',
                'last_name_err' => '',
                'email_err' => '',
                'role_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'title' => 'Add Users',
            ];

            if (empty($data['first_name'])) {
                $data['first_name_err'] = "Please enter First Name!";
            }

            if (empty($data['last_name'])) {
                $data['last_name_err'] = "Please enter Last Name!";
            }

            if (empty($data['email'])) {
                $data['email_err'] = "Please enter email!";
            } else {
                if ($this->postModel->findUserByEmail($data["email"])) {
                    $data["email_err"] = 'Email is already taken';
                }
            }
            if (empty($data['role'])) {
                $data['role_err'] = "Please enter role!";
            } else {
                if ($data['role'] == 'Admin' || $data['role'] == 'Staff') {
                    $data['role_err'] = '';
                } else {
                    $data['role_err'] = "Role can only be 'Admin' or 'Staff'";
                }
            }

            if (empty($data['username'])) {
                $data['username_err'] = "Please enter username!";
            } else {
                if ($this->postModel->findUserByUsername($data["username"])) {
                    $data["username_err"] = 'Username is already taken';
                }
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password!";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters!";
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password!";
            } else {
                if (($data['password']) != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Passwords do not match!";
                }
            }

            if (
                empty($data["first_name_err"]) && empty($data["last_name_err"]) && empty($data["email_err"]) && empty($data["role_err"])
                && empty($data["username_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])
            ) {
                $data["password"] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->postModel->add_User($data)) {
                    flash('tabledata', 'You have added a user sucessfully');
                    redirect('table/index');
                } else {
                    die('Something went wrong');
                }

            } else {

                $this->view('tabledata/adduser', $data);
            }


        } else {
            $data = [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'role' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'email_err' => '',
                'role_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'title' => 'Add Users',
            ];


            $this->view('tabledata/adduser', $data);
        }

    }

    public function edituser($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = [
                'user_id' => $id,
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'first_name_err' => '',
                'last_name_err' => '',
                'email_err' => '',
                'role_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'title' => 'Edit Users',
            ];

            if (empty($data['first_name'])) {
                $data['first_name_err'] = "Please enter First Name!";
            }

            if (empty($data['last_name'])) {
                $data['last_name_err'] = "Please enter Last Name!";
            }

            if (empty($data['email'])) {
                $data['email_err'] = "Please enter email!";
            } else {

            }
            if (empty($data['role'])) {
                $data['role_err'] = "Please enter role!";
            } else {
                if ($data['role'] == 'Admin' || $data['role'] == 'Staff') {
                    $data['role_err'] = '';
                } else {
                    $data['role_err'] = "Role can only be 'Admin' or 'Staff'";
                }
            }

            if (empty($data['username'])) {
                $data['username_err'] = "Please enter username!";
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password!";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters!";
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password!";
            } else {
                if (($data['password']) != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Passwords do not match!";
                }
            }

            if (
                empty($data["first_name_err"]) && empty($data["last_name_err"]) && empty($data["email_err"]) && empty($data["role_err"])
                && empty($data["username_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])
            ) {
                $data["password"] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->postModel->updateUser($data)) {
                    flash('tabledata', 'You have updated a user sucessfully');
                    redirect('table/index');
                } else {
                    die('Something went wrong');
                }

            } else {

                $this->view('tabledata/edituser', $data);
            }


        } else {
            $user_data = $this->postModel->getUserById($id);

            $data = [
                'user_id' => $id,
                'first_name' => $user_data->first_name,
                'last_name' => $user_data->last_name,
                'email' => $user_data->email,
                'role' => $user_data->role,
                'username' => $user_data->username,
                'password' => '',
                'confirm_password' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'email_err' => '',
                'role_err' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'title' => 'Edit Users',
            ];


            $this->view('tabledata/edituser', $data);
        }

    }
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteUser($id)) {
                flash('tabledata', 'You have deleted a user sucessfully');
                redirect('table');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('table');
        }
    }
}
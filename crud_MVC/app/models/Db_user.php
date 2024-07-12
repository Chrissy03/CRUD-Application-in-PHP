<?php
class Db_user
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDb_users()
    {
        $this->db->query("SELECT * FROM user_details");

        $results = $this->db->resultSet();

        return $results;
    }

    public function findUserByRole($role)
    {
        $this->db->query("SELECT * FROM user_details WHERE role = :role");
        $this->db->bind(":role", $role);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByUsername($username)
    {
        $this->db->query("SELECT * FROM user_details WHERE username = :username");
        $this->db->bind(":username", $username);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM user_details WHERE email = :email");
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_User($data)
    {
        $this->db->query("INSERT INTO user_details (first_name, last_name, email, role, username, password)
        VALUES (:first_name, :last_name, :email, :role, :username, :password)");

        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":role", $data['role']);
        $this->db->bind(":username", $data['username']);
        $this->db->bind(":password", $data['password']);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($username, $password)
    {

        $this->db->query('SELECT * FROM user_details WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->single();
        $hashed_password = $row->password;

        if ($password == $hashed_password){
            return $row;
        } else {
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM user_details WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateUser($data){
        $this->db->query("UPDATE user_details SET first_name = :first_name, last_name = :last_name,
        email = :email, role = :role, username = :username, password = :password
        WHERE id = :id");
        
        $this->db->bind(":id", $data['user_id']);
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":role", $data['role']);
        $this->db->bind(":username", $data['username']);
        $this->db->bind(":password", $data['password']);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id){
        $this->db->query("DELETE FROM user_details WHERE id = :id");
        $this->db->bind(":id", $id);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }
}


<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Specify the table name
    protected $primaryKey = 'id'; // Specify the primary key
    protected $allowedFields = ['name', 'email', 'password', 'profile_picture']; // Specify the fields that can be mass assigned

    public function register($data)
    {
        return $this->insert($data); // Use the insert method provided by the Model class
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)->first(); // Use where() and first() to get the user
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return the user if password matches
        }
        return false; // Return false if no user found or password does not match
    }

    public function updateUser ($id, $data)
    {
        return $this->update($id, $data);
    }

    public function get_user($id)
    {
        return $this->find($id); // Use find() to get the user by ID
    }
    public function ByEmail($email)
    {
        return $this->where('email', $email)->first(); // Use where() and first() to get the user
    }
}
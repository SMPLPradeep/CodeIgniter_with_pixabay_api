<?php

namespace App\Controllers;

use App\Models\UserModel; // Ensure this is the correct namespace
use CodeIgniter\Controller; // Make sure to import the base controller

class Auth extends Controller // Extend the base controller
{
    protected $userModel;

    public function __construct()
    {
        // Instantiate the UserModel
        $this->userModel = new UserModel();
        // Load session library if needed (CodeIgniter 4 handles this automatically)
    }

    public function register()
    {
        // var_dump($this->request->getMethod());
     
        if ($this->request->getMethod() === 'POST') {
            // Debugging: Check if the form data is received
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'profile_picture' => $this->upload_picture()
            ];

            // Debugging: Check the data before inserting
            // var_dump($data);
            // die(); 

            // Attempt to insert the data
            if ($this->userModel->insert($data)) {
                return redirect()->to('auth/login'); // Redirect to login after successful registration
            } else {
                // Handle the error if insertion fails
                session()->setFlashdata('error', 'Registration failed. Please try again.');
            }
        }
        return view('register'); // Return the register view
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            // Validate input data
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email',
                'password' => 'required',
            ]);

            if (!$this->validate($validation->getRules())) {
                // Validation failed, return to the login view with errors
                return view('login', [
                    'validation' => $this->validator,
                ]);
            }

            // Proceed with login
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $this->userModel->ByEmail($email); // Ensure this method exists

            if ($user && password_verify($password, $user['password'])) {
                session()->set('user_id', $user['id']); // Set session data
                return redirect()->to('dashboard'); // Redirect to dashboard
            } else {
                session()->setFlashdata('error', 'Invalid credentials'); // Set flashdata for error
            }
        }
        return view('login'); // Return the login view
    }

    public function logout()
    {
        session()->remove('user_id'); // Remove user_id from session
        return redirect()->to('auth/login'); // Redirect to login
    }

    private function upload_picture()
    {
        // Implement file upload logic here
        return 'default.jpg'; // Placeholder for profile picture
    }

    public function profile()
    {
        $user_id = session()->get('user_id'); // Get user_id from session
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'profile_picture' => $this->upload_picture()
            ];
            $this->userModel->update($user_id, $data); // Update user data
            return redirect()->to('dashboard'); // Redirect to dashboard
        }
        $data['user'] = $this->userModel->find($user_id); // Fetch user data
        return view('profile', $data); // Return the profile view
    }
}
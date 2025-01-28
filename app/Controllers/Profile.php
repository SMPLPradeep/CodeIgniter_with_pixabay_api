<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; // Import the UserModel

class Profile extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $user_id = session()->get('user_id');
        
        if ($this->request->getMethod() === 'POST') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'profile_picture' => $this->upload_picture()
            ];

            // Handle password update
            $newPassword = $this->request->getPost('new_password');
            if (!empty($newPassword)) {
                // Hash the new password before saving
                $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            }

            // Update user data
            $this->userModel->updateUser ($user_id, $data);
            return redirect()->to('dashboard')->with('success', 'Profile updated successfully.');
        }

        $data['user'] = $this->userModel->find($user_id);
        
        return view('profile', $data);
    }
    
    private function upload_picture()
    {
        $file = $this->request->getFile('profile_picture');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('upload_users_profile', $newName); // Move to public/upload_users_profile
            return $newName;
        }
        return 'default.jpg'; // Return default if no file uploaded
    }
}
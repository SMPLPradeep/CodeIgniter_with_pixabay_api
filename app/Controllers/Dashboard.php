<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; // Import the UserModel

class Dashboard extends Controller
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel(); // Instantiate the UserModel
        // Check if the user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('auth/login'); // Redirect to login if not logged in
        }
    }

    public function index() {
        // Debugging: Check if the method is reached
        
        // Get the user data
        $user = $this->userModel->get_user(session()->get('user_id'));
        $data['user'] = $user;
        // print_r($data);
        return view('dashboard', $data); // Return the dashboard view with user data
    }
}
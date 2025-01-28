<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; // Import the UserModel

class Search extends Controller {

    public function index() {
        return view('search'); // Use return view() instead of $this->load->view()
    }

    public function results() {
        $query = $this->request->getPost('query'); // Use getPost() to retrieve the query
        $api_key = '48510132-167b8de54f5b259067c62c671';
        $url = "https://pixabay.com/api/?key={$api_key}&q=" . urlencode($query);
        $response = file_get_contents($url);
        $data['results'] = json_decode($response)->hits;
        return view('search_results', $data); // Use return view() instead of $this->load->view()
    }
}
<?php

namespace App\Controllers;

use App\Models\kepegawaianModel;

class Coba extends BaseController
{
    protected $kepegawaianModel;
    public function __construct()
    {
        $this->kepegawaianModel = new kepegawaianModel();
    }
    public function index()
    {
        // return view('welcome_message');
        $data = [
            'title' => 'E-DaPeg | Home',
            'coba' => $this->kepegawaianModel->findAll()
        ];
        return view('coba', $data);
    }
}

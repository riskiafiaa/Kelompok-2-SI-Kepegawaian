<?php

namespace App\Controllers;

use App\Models\kepegawaianModel;

class Home extends BaseController
{
    protected $kepegawaianModel;
    public function __construct()
    {
        $this->kepegawaianModel = new kepegawaianModel();
    }
    public function index()
    {
        $dashboard_pegawai = $this->kepegawaianModel->findAll();

        // return view('welcome_message');
        $data = [
            'title' => 'E-DaPeg | Home',
            'kepegawaian' => $dashboard_pegawai
        ];

        //$KepegawaianModel = new \App\Models\KepegawaianModel();
        // $KepegawaianModel = new KepegawaianModel();

        // echo view('layout/header', $data); 
        return view('home', $data);
        // echo view('layout/footer');
    }
}

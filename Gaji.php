<?php

namespace App\Controllers;

use App\Models\gajiModel;

class Gaji extends BaseController
{
    protected $gajiModel;
    public function __construct()
    {
        $this->gajiModel = new gajiModel();
    }
    public function index()
    {
        $gaji = $this->gajiModel->findAll();
        $data = [
            'title' => 'E-DaPeg | Gaji',
            'gaji' => $gaji
        ];
        // echo view('layout/header', $data);
        return view('gaji', $data);
        // echo view('layout/footer');
    }
}

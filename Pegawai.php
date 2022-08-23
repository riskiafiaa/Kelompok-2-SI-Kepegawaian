<?php

namespace App\Controllers;

use App\Models\datapegawaiModel;
use CodeIgniter\HTTP\Request;

class Pegawai extends BaseController
{
    protected $datapegawaiModel;
    public function __construct()
    {
        $this->datapegawaiModel = new datapegawaiModel();
    }

    public function index()
    {
        // $data_pegawai = $this->datapegawaiModel->findAll();
        $jumlahbaris = 10;
        $katakunci = $this->request->getGet('katakunci');
        if ($katakunci) {
            $pencarian = $this->datapegawaiModel->cari($katakunci);
        } else {
            $pencarian = $this->datapegawaiModel;
        }
        $data = [
            'title' => 'E-DaPeg | Pegawai',
            // 'datapegawai' => $data_pegawai,
            'katakunci' => $katakunci,
            'datapegawai' => $pencarian->orderBy('id', 'desc')->paginate($jumlahbaris),
            'pager' => $this->datapegawaiModel->pager,
            'nomor' => ($this->request->getVar('page') == 1) ? '0' : $this->request->getVar('page')
        ];
        // echo view('layout/header', $data);
        return view('pegawai', $data);
        // echo view('layout/footer');
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Pegawai'
        ];
        return view('pegawai/tambah', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'nip' => [
                'label' => 'nip',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_pegawai' => [
                'label' => 'nama_pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'jenis_kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jabatan' => [
                'label' => 'jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $id = $this->request->getPost('id');
            $nama_pegawai = $this->request->getPost('nama_pegawai');
            $nip = $this->request->getPost('nip');
            $ttl = $this->request->getPost('ttl');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $alamat = $this->request->getPost('alamat');
            $jabatan = $this->request->getPost('jabatan');
            $jumlah_kehadiran = $this->request->getPost('jumlah_kehadiran');
            $total_lembur = $this->request->getPost('total_lembur');
            $nominal_gaji = $this->request->getPost('nominal_gaji');

            $data = [
                'id' => $id,
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'ttl' => $ttl,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'jabatan' => $jabatan,
                'jumlah_kehadiran' => $jumlah_kehadiran,
                'total_lembur' => $total_lembur,
                'nominal_gaji' => $nominal_gaji,


            ];
            $this->pegawaiModel->save($data);
            $hasil['sukses'] = "berhasil memasukan data";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        return json_encode($hasil);
    }

    public function edit($id)
    {
        return json_encode($this->datapegawaiModel->find($id));
    }

    public function hapus($id)
    {
        $this->datapegawaiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/Pegawai');
    }
}

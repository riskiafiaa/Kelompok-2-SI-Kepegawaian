<?php

namespace App\Models;

use CodeIgniter\Model;

class datapegawaiModel extends Model
{
    protected $table = 'data_pegawai';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nip', 'nama_pegawai', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'jabatan', 'jumlah_kehadiran', 'total_lembur', 'nominal_gaji'];
    function cari($katakunci)
    {
        $builder = $this->table('data_pegawai');
        $arr_katakunci = explode("", $katakunci);
        for ($x = 0; $x < count($arr_katakunci); $x++) {
            $builder->orlike('nip', $arr_katakunci[$x]);
            $builder->orlike('nama_pegawai', $arr_katakunci[$x]);
        }
        return $builder;
    }
}

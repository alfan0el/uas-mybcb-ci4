<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NasabahModel;
use Config\Services;

class AuthController extends BaseController
{
    protected $validation;

    public function __construct()
    {
        $this->validation = Services::validation();
    }

    public function loginView()
    {
        helper(['form']);
        return view('/auth/view_login');
    }

    public function loginAuth()
    {
        $session = session();
        $nasabahModel = new NasabahModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $nasabahModel->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $session_data = [
                    'nasabah_id' => $data['nasabah_id'],
                    'nama_lengkap' => $data['nama_lengkap'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'tempat_tgl_lahir' => $data['tempat_tgl_lahir'],
                    'agama' => $data['agama'],
                    'alamat_lengkap' => $data['alamat_lengkap'],
                    'nomor_telepon' => $data['nomor_telepon'],
                    'nomor_rekening' => $data['nomor_rekening'],
                    'saldo' => $data['saldo'],
                    'email' => $data['email'],
                    'is_logged_in' => TRUE
                ];
                $session->set($session_data);
                return redirect()->to(base_url('/dashboard'));
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to(base_url('/login'));
        }
    }

    public function signupView()
    {
        return view('auth/view_signup');
    }

    public function signupAuth()
    {
        helper(['form']);
        $rules = [
            'nama_lengkap'  => 'required|min_length[3]|max_length[50]',
            'email'          => 'required|valid_email|is_unique[nasabah.email]',
            'username'      => 'required|min_length[3]|max_length[50]|is_unique[nasabah.username]',
            'password'      => 'required|min_length[3]|max_length[50]',
        ];

        if ($this->validate($rules)){
            $min = 111111;
            $max = 999999;
            $nomorRekening = random_int($min, $max);
            $nomorRekening = "6871" . $nomorRekening;

            $model = new NasabahModel();
            $data = [
                'nama_lengkap'  => $this->request->getVar('nama_lengkap'),
                'email'         => $this->request->getVar('email'),
                'username'      => $this->request->getVar('username'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'nomor_rekening'=> $nomorRekening,
                'saldo'         => 100000,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
                'deleted_at'    => null,
            ];
            $model->save($data);
            return redirect()->to(base_url('/login'));
        } else {
            $data['validation'] = $this->validator;
            return view('auth/view_signup', $data);
        }
    }

    // Logout
    public function logout()
    {
        $session = session();
        $session->set(array(
            'user_id' => '',
            'user_name' => '',
            'email' => '',
            'role' => '',
            'is_logged_in' => FALSE
        ));
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}

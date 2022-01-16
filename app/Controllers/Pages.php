<?php

namespace App\Controllers;
use \App\Models\LoginModel;
use CodeIgniter\Validation\Rules;

class Pages extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        return view('form/login');
    }

    
    public function dashboard()
    {
        if (session('login') == false) {
            return redirect()->to('/');
        }
        
        return view('form/dashboard');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $result = $this->loginModel->where(['username' => $username])->first();
        if ($result['username'] == $username && password_verify($password, $result['password'])) {

            session()->set('login', true);
            return redirect()->to('/pages/dashboard');
            
        }
        
        return view('form/login');
    }
    
    public function remove()
    {
        session()->remove('login');
        
        return redirect()->to('/');
    }
    
    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('form/register', $data);
    }

    public function createUser()
    {
        // Validasi
        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_space|is_unique[users.username]|max_length[8]|min_length[3]',
                'errors' => [
                    'required' => 'harap isi bidang ini',
                    'alpha_space' => 'spasi,karakter,angka dilarang',
                    'is_unique' => 'username sudah terdaftar',
                    'max_length' => 'maksimal 8 huruf',
                    'min_length' => 'minimal 3 huruf',
                ]
                ],
            
            'password' => [
                'rules' => 'required|is_unique[users.username]|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => 'harap isi bidang ini',
                    'min_length' => 'minimal 8 karakter',
                    'max_length' => 'maksimal 16 karakter',
                ]
                ],

            'password' => [
                'rules' => 'required|is_unique[users.username]|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => 'harap isi bidang ini',
                ]
                ],

            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi bidang ini',
                ]
            ]
        ])) {
            return redirect()->to('/pages/register')->withInput();
        }
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $cpassword = $this->request->getVar('c-password');
        $epassword = password_hash($password, PASSWORD_DEFAULT);

        if ($password != $cpassword) {
            session()->setFlashdata('eror', 'Password Tidak Cocok!');

            return redirect()->to('/pages/register')->withInput();
        }

        
        $this->loginModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => $epassword,
        ]);

        return redirect()->to('/');
    }
}

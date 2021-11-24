<?php

namespace App\Controllers;

use function App\Helpers\toGet;
use function App\Helpers\toPost;

class User extends BaseController
{
    protected $session;

    function __construct()
    {
        helper('requests');
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        $res = $this->getUsers();
        return view('templates/index', ['view_name' => 'pages/cadastro/home', 'users' => $res->data]);
    }

    public function cadastrar()
    {
        $data = [];

        $rules = [
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'nascimento' => 'required',
            'sexo' => 'required'
        ];

        if (!$this->validate($rules)) {
            $res = $this->getUsers();
            return view('templates/index', [
                'view_name' => 'pages/cadastro/home', 
                'users' => $res, 
                'validation' => $this->validator]
            );
        }


        $data = json_encode([
            "nome" => $this->request->getVar('nome'),
            "email" => $this->request->getVar('email'),
            "telefone" => $this->request->getVar('telefone'),
            "dataNascimento" => $this->request->getVar('nascimento'),
            "sexo" => $this->request->getVar('sexo')
        ]);

        try {
            $res = toPost($data, '/create-user', session()->get('access_token'));
            return view('templates/index', ['view_name' => 'pages/cadastro/message', 'message' => $res->data]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . '/');
    }

    private function getUsers()
    {
        return toGet('/get-users', session()->get('access_token'));
    }
}

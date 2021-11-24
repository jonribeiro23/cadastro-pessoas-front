<?php

namespace App\Controllers;

use function App\Helpers\toPost;

class Index extends BaseController
{
  function __construct()
  {
    helper('requests');
    $this->session = \Config\Services::session();
  }

  public function index()
  {
    return view('templates/index', ['view_name' => 'pages/login/form']);
  }

  public function login()
  {
    $data = [];

    $rules = [
      'email' => 'required',
      'password' => 'required'
    ];

    if (!$this->validate($rules)) {
      return view('templates/index', ['view_name' => 'pages/login/form', 'validation' => $this->validator]);
    }

    $data = json_encode([
      'email' => $this->request->getVar('email'),
      'password' => $this->request->getVar('password')
    ]);

    try {
      $res = toPost($data, '/', null);
      if ($res->success) {
        $this->setUserMethod($res->data[0]->user->email, $res->data[0]->token);
        return redirect()->to(base_url('home'));
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  private function setUserMethod($email, $token)
  {
    $data = [
      'email' => $email,
      'access_token' => $token,
      'is_logged_in' => true
    ];

    session()->set($data);
    return true;
  }

}

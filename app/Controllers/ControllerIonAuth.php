<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use IonAuth\Libraries\IonAuth;

class ControllerIonAuth extends BaseController
{
    protected $ionAuth;

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);
        $this->ionAuth = new IonAuth();
    }

    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $identity = $this->request->getPost('identity');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember') ? true : false;

            if ($this->ionAuth->login($identity, $password, $remember)) {
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', $this->ionAuth->errors());
            }
        }

        return view('IonAuth/ViewLogin');
    }

    public function logout()
    {
        $this->ionAuth->logout();
        return redirect()->to('/login')->with('message', 'You have been logged out successfully.');
    }


    public function register()
    {
        $method = strtolower($this->request->getMethod());

        if ($method === 'post') {            
            $identity = $this->request->getPost('identity');
            $password = $this->request->getPost('password');
            $email = $this->request->getPost('email');
            $additional_data = [];
            $group = ['2'];
            
            $registered = $this->ionAuth->register($identity, $password, $email, $additional_data, $group);
            
            if ($registered) {
                echo view('IonAuth/ViewLogin');
            }
        } else {
            echo view('IonAuth/ViewLogin');
        }
    }
}
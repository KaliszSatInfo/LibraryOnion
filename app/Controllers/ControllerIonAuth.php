<?php

namespace App\Controllers;

use IonAuth\Libraries\IonAuth;

class ControllerIonAuth extends BaseController
{
    var $ionAuth;

    public function __construct()
    {
        $this->ionAuth = new IonAuth();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $identity = $this->request->getPost('identity');
            $password = $this->request->getPost('password');

            if ($this->ionAuth->login($identity, $password)) {
                log_message('info', 'User logged in: ' . $identity);
                return redirect()->to('/');
            } else {
                $error = $this->ionAuth->errors();
                log_message('error', 'Login failed: ' . $error);

                return redirect()->back()
                    ->with('error', $error)
                    ->withInput();
            }
        }

        return view('auth/ViewLogin');
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $additionalData = [];
            $group = array("2");
            
            log_message('debug', "Register called with email={$email}, username={$username}");

            $identityColumn = config('IonAuth')->identity;
            log_message('debug', "Configured identity column: {$identityColumn}");

            $register = $this->ionAuth->register($username, $password, $email);
            //$register = $this->ionAuth->register()

            if (!$register) {
                $errors = $this->ionAuth->errors();
                log_message('error', "Registration failed: " . $errors);
                return redirect()->back()
                    ->with('error', $errors)
                    ->withInput();
            }

            log_message('info', "User registration succeeded for {$email}");
            return redirect()->to('/login')->with('message', 'User registered!');
        }

        return view('auth/ViewRegister');
    }

}

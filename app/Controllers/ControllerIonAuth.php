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

    public function loadLogin()
    {
        $referrer = previous_url();
        if (!str_contains($referrer, '/login') && !str_contains($referrer, '/logout')) {
            session()->set('redirect_url', $referrer);
        }

        return view('IonAuth/ViewLogin');
    }

    public function processLogin()
    {
        $input = $this->request->getPost('identity');
        $password = $this->request->getPost('password');

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $user = $this->ionAuth->where('email', $input)->users()->row();
        } else {
            $user = $this->ionAuth->where('username', $input)->users()->row();
        }

        if ($user) {
            $identity = $user->username;
            if ($this->ionAuth->login($identity, $password)) {
                $redirectUrl = session()->get('redirect_url') ?? '/';
                session()->remove('redirect_url');
                return redirect()->to($redirectUrl);
            }
        }

        return redirect()->back()->with('error', $this->ionAuth->errors() ?: 'Invalid login credentials.');
    }

    public function loadRegister()
    {
        return view('IonAuth/ViewRegister');
    }

    public function processRegister()
    {
        $identity = $this->request->getPost('identity');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $additional_data = [];
        $group = ['2'];

        $registered = $this->ionAuth->register($identity, $password, $email, $additional_data, $group);

        if ($registered) {
            return redirect()->to('/login')->with('message', 'Registered successfully, you can now login.');
        }

        return redirect()->back()->with('error', $this->ionAuth->errors());
    }

    public function logout()
    {
        $this->ionAuth->logout();
        return redirect()->to('/login')->with('message', 'You have been logged out successfully.');
    }
}
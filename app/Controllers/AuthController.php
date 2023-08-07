<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
        //
    }

    public function loginhandler()
    {
        //echo Hash::make('1234');
        //exit;
        $fieldType = filter_var($this->request->getVar('l_uname'), FILTER_VALIDATE_EMAIL) ? 'u_email' : 'u_loginname';

        if ($fieldType == 'u_email') {
            $isValid = $this->validate([
                'l_uname' => [
                    'rules' => 'required|valid_email|is_not_unique[ek_admin.u_email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Please check the email field. It does not appers to be valid email.',
                        'is_not_unique' => 'Email is not exits in our system.',

                    ]
                ],
                'l_upass' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 5 characters in length',
                        'max_length' => 'Password must not have characters more than 45 in length',

                    ]
                ]
            ]);
        } else {
            $isValid = $this->validate([
                'l_uname' => [
                    'rules' => 'required|is_not_unique[ek_admin.u_loginname]',
                    'errors' => [
                        'required' => 'Username is required',
                        'is_not_unique' => 'Username is not exits in our system.',

                    ]
                ],
                'l_upass' => [
                    'rules' => 'required|min_length[3]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 3 characters in length',
                        'max_length' => 'Password must not have characters more than 45 in length',

                    ]
                ]
            ]);
        }

        if (!$isValid) {
            return view('login/login_page', [
                'pageTitle' => 'Login',
                'validation' => $this->validator

            ]);
        } else {
            $userInfo = "";
            $user = new UserModel();
            $userInfo = $user->where($fieldType, $this->request->getVar('l_uname'))->first();

            $check_password = Hash::check($this->request->getVar('l_upass'), $userInfo['u_loginpass']);
            if (!$check_password) {
                return redirect()->route('admin.login.form')->with('fail', 'Wronged password!');
            } else {
                CIAuth::setCIAuth($userInfo);
                return redirect()->route('admin.home');
            }
            //echo "berjaya validate";
        }
    }

    public function logouthandler()
    {
        CIAuth::forget();
        return redirect()->route('admin.login.form')->with('Fail', 'You are logged out!');
    }
}

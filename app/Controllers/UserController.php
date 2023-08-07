<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;

class UserController extends BaseController
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        $data['title'] = "Users";
        $db = \Config\Database::connect();
        $role = $this->session->get('userdata')['u_role'];

        $query = $db->table('ek_admin');

        $query->where("ek_admin.u_id not in(1)");
        $query->join("ek_lkprole", "ek_lkprole.role_id = ek_admin.u_role");
        $query->orderBy("u_id", "ASC");
        $exercises = $query->get()->getResult();

        $data['exercises'] =  $exercises;
        return view('user/userlisting', $data);
    }
    public function profile()
    {
        $data['title'] = "Update Profile";
        $user = new UserModel();
        $u_id = $this->session->get('userdata')['u_id'];
        $data['user'] =  $user->getUser($u_id);
        return view('user/profile', $data);
    }
    public function password()
    {
        $data['title'] = "Change Password";
        return view('user/password', $data);
    }
    public function updatepassword()
    {
        $isValid = $this->validate([
            'newpassword' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 5 characters in length',
                    'max_length' => 'Password must not have characters more than 45 in length',
                ]
            ],
            'newpassword2' => [
                'rules' => 'required|matches[newpassword]',
                'errors' => [
                    'required' => 'Password is required',
                    'matches' => 'Passwords do not match',
                ]
            ]
        ]);

        if (!$isValid) {
            return redirect()->to('profile/password')->with('fail', $this->validator->getErrors());
        } else {
            $newpassword = $this->request->getPost('newpassword');
            $user = new UserModel();
            $u_id = $this->session->get('userdata')['u_id'];
            $checkuser = $user->find($u_id);
            if ($checkuser) {
                $data = [
                    'u_loginpass' => Hash::make($newpassword)
                ];

                $user->update($u_id, $data);

                return redirect()->to('profile/password')->with('success', 'Password has been changed.');
            } else {
                return redirect()->to('/user')->with('fail', 'User not found.');
            }
        }
    }
    public function updateprofile()
    {
        $isValid = $this->validate([
            'namapenuh' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Full Name is required',
                    'min_length' => 'Full Name must have atleast 3 characters in length',
                ]
            ],
            'email' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Please check the email field. It does not appers to be valid email.',
                ]
            ]
        ]);

        if (!$isValid) {
            return redirect()->to('profile')->with('fail', $this->validator->getErrors());
        } else {
            $user = new UserModel();

            $u_id = $this->session->get('userdata')['u_id'];
            $checkuser = $user->find($u_id);

            if ($checkuser) {
                $data = [
                    'u_fullname' => $this->request->getPost('namapenuh'),
                    'u_email' => $this->request->getPost('email'),
                    'u_contact' => $this->request->getPost('notel'),
                    'u_position' => $this->request->getPost('jawatan'),
                ];

                $user->update($u_id, $data);

                return redirect()->to('profile')->with('success', 'Profile has been updated.');
            } else {
                return redirect()->to('profile')->with('fail', 'User not found.');
            }
        }
    }
    public function edit($id)
    {
        $data['title'] = "Update User";
        $role = $this->session->get('userdata')['u_role'];
        $user = new UserModel();
        $data['user'] = $user->getUser(base64_decode($id));
        $data['roles'] = $user->selectRole();
        $data['role'] = $role;

        return view('user/edit', $data);
    }
    public function add()
    {
        $data['title'] = "Add New User";
        $user = new UserModel();
        $role = $this->session->get('userdata')['u_role'];
        $data['roles'] = $user->selectRole();
        $data['role'] = $role;
        return view('user/form', $data);
    }
    public function store()
    {
        $namapenuh = $this->request->getPost('namapenuh');
        if (is_string($namapenuh)) {
            $namapenuh = strtoupper($namapenuh);
        } else {
            $namapenuh = $namapenuh;
        }
        $notel = $this->request->getPost('notel');
        $email = $this->request->getPost('email');
        $jawatan = $this->request->getPost('jawatan');
        $noic = $this->request->getPost('noic');
        $password = $this->request->getPost('password');
        $peranan = $this->request->getPost('peranan');
        $status = $this->request->getPost('status');

        $data = [
            'u_loginname' => $noic,
            'u_loginpass' => Hash::make($password),
            'u_fullname' => $namapenuh,
            'u_noic' => $noic,
            'u_email' => $email,
            'u_contact' => $notel,
            'u_status' => $status,
            'u_role' => $peranan,
            'u_position' => $jawatan,
        ];
        $user = new UserModel();

        $user->insert($data);

        return redirect()->to('/user')->with('success', 'New data has been register.');
    }
    public function update()
    {
        $namapenuh = $this->request->getPost('namapenuh');
        if (is_string($namapenuh)) {
            $namapenuh = strtoupper($namapenuh);
        } else {
            $namapenuh = $namapenuh;
        }
        $notel = $this->request->getPost('notel');
        $email = $this->request->getPost('email');
        $jawatan = $this->request->getPost('jawatan');
        $noic = $this->request->getPost('noic');
        $peranan = $this->request->getPost('peranan');
        $status = $this->request->getPost('status');
        $u_id = $this->request->getPost('u_id');
        if (is_string($u_id)) {
            $u_id = base64_decode($u_id);
        } else {
            $u_id = $u_id;
        }

        $user = new UserModel();
        $checkuser = $user->find($u_id);
        if ($checkuser) {
            $data = [
                'u_loginname' => $noic,
                'u_fullname' => $namapenuh,
                'u_noic' => $noic,
                'u_email' => $email,
                'u_contact' => $notel,
                'u_status' => $status,
                'u_role' => $peranan,
                'u_position' => $jawatan,
            ];

            $user->update($u_id, $data);

            return redirect()->to('/user')->with('success', 'Data has been updated.');
        } else {
            return redirect()->to('/user')->with('fail', 'User not found.');
        }
    }
}

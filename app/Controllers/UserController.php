<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    private $users;
    private $products;

    function __construct(){
        helper(['form']);
        $this->users = new AdminModel();
        $this->products = new UserModel();
    }

    public function index()
    {
        //
    }

    public function loginPage(){
        helper(['form']);
        return view('Login');
    }

    public function signupPage(){
        helper(['form']);
        return view('SignUp');
    }

    public function register(){
        helper(['form']);
        $rules = [
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)){
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                'user_role' => 'User'
            ];
            $this->users->insert($data);
            return redirect()->to('/signup');
        }else{
            $data['validation'] = $this->validator;
            echo view('SignUp',$data);
        }
    }

    public function Login(){
        helper(['form']);
        return view('Login');
    }

    public function LoginAuth(){
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->users->where('email',$email)
                            ->first();
        if($data){
            $pass = $data['password'];
            $authenticatedPassword = password_verify($password,$pass);

            if($authenticatedPassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['email'],
                    'isLoggedIn' => TRUE,
                    'userRole' => $data['user_role'],
                ];
                $session->set($ses_data);

                if($data['user_role'] === 'Admin'){
                    return view('Admin/index');
                }else if($data['user_role'] === 'User'){
                    return redirect()->to('/');
                }
            }else{
                $session->setFlashdata('msg','Password is incorrect');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','Email does not exist');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy the user's session
        return redirect()->to('/'); // Redirect the user to the login page or any other page after logout
    }
}

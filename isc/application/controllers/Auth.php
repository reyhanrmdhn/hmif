<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()

    {

        $this->load->view('auth/login');
        // if ($this->session->userdata('email')) {

        //     redirect('user');

        // }

        // $this->form_validation->set_rules('email', 'Email', 'trim');

        // $this->form_validation->set_rules('password', 'Password');

        // if ($this->form_validation->run() == false) {


        // } else { //validasi sukses

        //     $this->_login();

        // }

    }

    private function _login()

    {

        $email = $this->input->post('email');

        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) { //jika login dengan HANKAM

            if (password_verify($password, $user['password'])) {

                if ($user['is_active'] == '1') { //akun aktif

                    $data = [

                        'id' => $user['id'],

                        'email' => $user['email'],

                        'role_id' => $user['role_id']

                    ];

                    $this->session->set_userdata($data);

                    if ($data['role_id'] == 1) {

                        redirect('admin');
                    } else if ($data['role_id'] == 2) {

                        redirect('user');
                    }
                } else { //akun tidak aktif

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Email belum diaktivasi!

                    </div>');

                    redirect('auth');
                }
            } else { //salah password

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

                    Password salah!

                    </div>');

                redirect('auth');
            }
        } else { //belum registrasi

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">

            Akun anda belum terdaftar!

             </div>');

            redirect('auth');
        }
    }



    public function regis()

    {

        $this->load->view('auth/regis');
    }



    public function logout()

    {

        $this->session->unset_userdata('email');

        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');

        redirect('auth');
    }

    public function blocked()

    {

        $this->load->view('auth/blocked');
    }
}

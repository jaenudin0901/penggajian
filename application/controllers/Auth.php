<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Form login";
            $this->load->view('templates_admin/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates_admin/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_karyawan', ['email' => $email])->row_array();


        // jika usernya ada
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'email' => $user['email'],
                    'hak_akses' => $user['hak_akses'],
                    'nik' => $user['nik']

                ];
                $this->session->set_userdata($data);
                if ($user['hak_akses'] == 1) {
                    redirect('admin/dashboard');
                } else {
                    redirect('karyawan/dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
            // jila usernya aktif
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Logout!</div>');
        redirect('auth');
    }
}

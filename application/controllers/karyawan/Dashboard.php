<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['judul'] = 'Dashboard Karyawan';
        $data['user'] = $this->db->get_where('data_karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $karyawan = $this->db->query("SELECT * FROM data_karyawan");
        $data['karyawan'] = $karyawan->num_rows();
        $admin = $this->db->query("SELECT * FROM data_karyawan WHERE jabatan = 'Admin'");
        $data['admin'] = $admin->num_rows();
        $jabatan = $this->db->query("SELECT * FROM data_jabatan ");
        $data['jabatan'] = $jabatan->num_rows();
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran ");
        $data['kehadiran'] = $kehadiran->num_rows();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/dashboard', $data);
        $this->load->view('templates_karyawan/footer');
    }

    public function ganti_password()
    {
        $data['judul'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('data_karyawan', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_karyawan/header', $data);
            $this->load->view('templates_karyawan/sidebar');
            $this->load->view('karyawan/ganti_password', $data);
            $this->load->view('templates_karyawan/footer');
        } else {
            $current_password = $this->input->post('current_password');

            $new_password = $this->input->post('new_password1');

            if ($current_password != $data['user']['password']) {

                $this->session->set_flashdata('flash', 'Wrong current password!');

                redirect('karyawan/dashboard/ganti_password');
            } else {

                if ($current_password == $new_password) {

                    $this->session->set_flashdata('flash', ' New password cannot be the sama as current password!');
                    redirect('user/changepasswd');
                } else {
                    // password sudah oke

                    // $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $new_password);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('data_karyawan');
                    $this->session->set_flashdata('flash', 'Password Changed!');
                    // $this->session->set_flashdata('message', '<div class="alert-danger" role="alert>" Password changed!</div>');
                    redirect('karyawan/dashboard');
                }
            }
        }
    }
}

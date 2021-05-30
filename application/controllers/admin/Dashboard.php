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
        $data['judul'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('data_karyawan', ['email' => $this->session->userdata('email')])->row_array();
        $karyawan = $this->db->query("SELECT * FROM data_karyawan");
        $data['karyawan'] = $karyawan->num_rows();
        $admin = $this->db->query("SELECT * FROM data_karyawan WHERE jabatan = 'Admin'");
        $data['admin'] = $admin->num_rows();
        $jabatan = $this->db->query("SELECT * FROM data_jabatan ");
        $data['jabatan'] = $jabatan->num_rows();
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran ");
        $data['kehadiran'] = $kehadiran->num_rows();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}

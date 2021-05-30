<?php
class Potongan_gaji extends CI_Controller
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
        $data['judul'] = 'Data Potongan Gaji';
        $data['potongan'] = $this->Potongan_model->getAllPotongan();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potongan_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Potongan Gaji';
        $this->form_validation->set_rules('jenis_potongan', 'Jenis Potongan', 'required');
        $this->form_validation->set_rules('jumlah_potongan', 'Jumlah Potongan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['potongan'] = $this->Potongan_model->getAllPotongan();
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_potongan', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Potongan_model->tambahDataPotongan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil ditambahkan!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
            redirect('admin/Potongan_gaji');
        }
    }
    public function hapus($id)
    {
        $this->Potongan_model->hapusDataPotongan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil dihapus!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
        redirect('admin/Potongan_gaji');
    }
}

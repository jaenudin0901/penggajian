<?php
class Data_jabatan extends CI_Controller
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

        $data['judul'] = 'Data Jabatan';
        // $data['jabatan'] = $this->Penggajian_model->get_data('data_jabatan')->result();
        $data['jabatan'] = $this->Penggajian_model->getAllDataJabatan();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah()
    {

        $data['judul'] = '  Tambah Data Jabatan';
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
        $this->form_validation->set_rules('transport', 'Transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Penggajian_model->tambahDataJabatan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil ditambahkan</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
            redirect('admin/Data_jabatan');
        }
    }

    public function hapus($id)
    {
        $this->Penggajian_model->hapusDataJabatan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil dihapus!</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
        redirect('admin/Data_jabatan');
    }

    public function ubah($id)
    {

        $data['judul'] = '  Ubah Data Jabatan';
        $data['jabatan'] = $this->Penggajian_model->getDataJabatanById($id);
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
        $this->form_validation->set_rules('transport', 'Transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Penggajian_model->ubahDataJabatan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil diubah</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
            redirect('admin/Data_jabatan');
        }
    }


















    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id');
            $nama_jabatan  = $this->input->post('nama_jabatan');
            $gaji_pokok  = $this->input->post('gaji_pokok');
            $transport  = $this->input->post('transport');
            $uang_makan  = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'transport' => $transport,
                'uang_makan' => $uang_makan
            );

            $where = array(
                'id' => $id
            );

            $this->Penggajian_model->update_data('data_jabatan', $where, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data Berhasil diupdate</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');

            redirect('admin/Data_jabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('transport', 'transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'Uang makan', 'required');
    }
}

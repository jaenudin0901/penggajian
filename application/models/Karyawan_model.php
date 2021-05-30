<?php
class Karyawan_model extends CI_model
{
    public function getAllDataKaryawan()
    {
        return $this->db->get('data_karyawan')->result_array();
    }

    public function hapusDataKaryawan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_karyawan');
    }

    public function tambahDataKaryawan()
    {
        $data = [
            "nama"  => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "jabatan" => $this->input->post('jabatan', true),
            "tanggal_masuk" => $this->input->post('tanggal_masuk', true),
            "status" => $this->input->post('status', true),
            "photo" => $this->input->post('photo', true),
            "hak_akses" => $this->input->post('hak_akses', true),
            "email" => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('data_karyawan', $data);
    }
}

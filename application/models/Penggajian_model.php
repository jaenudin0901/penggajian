<?php
class Penggajian_model extends CI_model
{
    public function getAllDataJabatan()
    {
        return $this->db->get('data_jabatan')->result_array();
    }

    public function tambahDataJabatan()
    {
        $data = [
            "nama_jabatan"  => $this->input->post('nama_jabatan', true),
            "gaji_pokok" => $this->input->post('gaji_pokok', true),
            "transport" => $this->input->post('transport', true),
            "uang_makan" => $this->input->post('uang_makan', true)
        ];

        $this->db->insert('data_jabatan', $data);
    }

    public function hapusDataJabatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_jabatan');
    }

    public function getDataJabatanById($id)
    {
        return $this->db->get_where('data_jabatan', ['id' => $id])->row_array();
    }

    public function ubahDataJabatan()
    {
        $data = [
            "nama_jabatan"  => $this->input->post('nama_jabatan', true),
            "gaji_pokok" => $this->input->post('gaji_pokok', true),
            "transport" => $this->input->post('transport', true),
            "uang_makan" => $this->input->post('uang_makan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_jabatan', $data);
    }









    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}

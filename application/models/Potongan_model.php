<?php
class Potongan_model extends CI_Model
{

    public function getAllPotongan()
    {
        return $this->db->get('potongan_gaji')->result_array();
    }

    public function hapusDataPotongan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('potongan_gaji');
    }

    public function tambahDataPotongan()
    {
        $data = [
            "jenis_potongan" => $this->input->post('jenis_potongan', true),
            "jumlah_potongan" => $this->input->post('jumlah_potongan', true)
        ];

        $this->db->insert('potongan_gaji', $data);
    }
}

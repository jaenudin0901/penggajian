<?php
class Absensi_model extends CI_model
{
    public function getAllDataAbsensi()
    {
        return $this->db->get('data_kehadiran')->result_array();
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }
}

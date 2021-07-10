<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table)->result();
    }

    public function getWhere($table, $condition)
    {
        return $this->db->get_where($table, $condition)->result();
    }

    public function uploadImage($filename)
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|jpeg|png|gif';
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($filename)) {

            $data = $this->upload->data();

            return $data['file_name'];
        }

        return "default.png";
    }
}

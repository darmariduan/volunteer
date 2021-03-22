<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    // News
    public function insert_berita($input)
    {
        return $this->db->insert('tbl_berita', $input);
    }

    public function update_berita($id, $data)
    {
        return $this->db->where('id_berita', $id)->update('tbl_berita', $data);
    }

    function delete_berita($id)
    {
        $row = $this->db->where('id_berita', $id)->get('tbl_berita')->row();
        unlink('./frontend/assets/images/berita/' . $row->image);
        $this->db->where('id_berita', $id);
        $this->db->delete('tbl_berita');
        return true;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function auth_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');

        // Associative array method:
        $array = array('username' => $username, 'password' => $password);

        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        $this->db->select('*');
        $this->db->from('role');
        $query = $this->db->get();
        return $query;
    }

    // Exclude Administor
    public function view1()
    {
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('id !=', '1');
        $query = $this->db->get();
        return $query;
    }

    public function viewagama()
    {
        $this->db->select('*');
        $this->db->from('agama');
        $query = $this->db->get();
        return $query;
    }

    public function viewprogram()
    {
        $this->db->select('*');
        $this->db->from('program');
        $query = $this->db->get();
        return $query;
    }

    // Insert new admin data
    public function insert_users($input)
    {
        return $this->db->insert('users', $input);
    }
    
    // Cek Username
    public function cek_User($username, $no_hp)
    {
        $this->db->select('username,nohp');
        $this->db->from('users');

        // Associative array method:
        $where = array('username' => $username, 'nohp' => $no_hp);
        
        $this->db->where($where);

        $query = $this->db->get();

        return $query;
    }
    
    // Update Password
    public function updatePass($input)
    {
        return $this->db->where('username', $input['username'])->update('users', $input);
    }
}

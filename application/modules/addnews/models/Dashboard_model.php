<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getProfile()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $query = $this->db->get();

        return $query;
    }

    // Dashboard

    // Cek jumlah User
    public function allUser()
    {
        $allUser = $this->db->get('users');
        if ($allUser->num_rows() > 0) {
            return $allUser->num_rows();
        } else {
            return 0;
        }
    }

    // Cek jumlah News
    public function news()
    {
        $new = $this->db->get('tbl_berita');
        if ($new->num_rows() > 0) {
            return $new->num_rows();
        } else {
            return 0;
        }
    }

    // View Users
    public function viewberita($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita', $id);
        $query = $this->db->get();
        return $query;
    }

    // Insert profile data
    public function insert($id, $nama, $deskripsi, $alamat, $email, $visi, $misi, $wasone, $wastwo, $motto)
    {
        $data = array(
            'id'				=> $id,
            'nama_komunitas' 	=> $nama,
            'deskripsi'			=> $deskripsi,
            'alamat'			=> $alamat,
            'email'				=> $email,
            'visi'				=> $visi,
            'misi'				=> $misi,
            'whatsapp_utama'	=> $wasone,
            'whatsapp_kedua'	=> $wastwo,
            'motto'				=> $motto
        );
        $this->db->where('id', $id);
        $this->db->update('profile', $data);
    }

    // News
    public function insert_berita($input)
    {
        return $this->db->insert('tbl_berita', $input);
    }

    public function update_berita($id, $input)
    {
        return $this->db->where('id_berita', $id)->update('tbl_berita', $input);
    }

    public function delete_berita($id)
    {
        $row = $this->db->where('id_berita', $id)->get('tbl_berita')->row();
        unlink('./frontend/assets/images/berita/' . $row->image);
        $this->db->where('id_berita', $id);
        $this->db->delete('tbl_berita');
        return true;
    }

    // Users
    public function getdata()
    {
        $this->db->select('users.id AS id,
		users.nama_admin AS nama_admin,
		users.alamat AS alamat,
		agama.keterangan AS agama,
		users.tempat AS tempat,
		users.organisasi AS organisasi,
		users.email AS email,
		users.nohp AS nohp,
		program.keterangan AS program,
		users.alamat AS alamat,
		users.username AS username,
		users.password AS password,
		role.keterangan AS level
		');
        $this->db->from('users');
        $this->db->join('role', 'users.level=role.id', 'left');
        $this->db->join('agama', 'users.agama=agama.id', 'inner');
        $this->db->join('program', 'users.program=program.id', 'inner');
        $query = $this->db->get();
        return $query;
    }

    public function update_users($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }

    // Announcement
    public function insert_announcent($input)
    {
        return $this->db->insert('announcement', $input);
    }

    public function update_announcement($id, $data)
    {
        return $this->db->where('id', $id)->update('announcement', $data);
    }

    public function delete_announcement($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('announcement');
        return true;
    }

    // Slider
    public function insert_slider($input)
    {
        return $this->db->insert('imgdashboard', $input);
    }

    public function delete_slider($id)
    {
        $row = $this->db->where('id', $id)->get('imgdashboard')->row();
        unlink('./frontend/assets/images/dashboard/' . $row->image);
        $this->db->where('id', $id);
        $this->db->delete('imgdashboard');
        return true;
    }

    // Message
    public function allMessages()
    {
        $messages = $this->db->get('message');
        if ($messages->num_rows() > 0) {
            return $messages->num_rows();
        } else {
            return 0;
        }
    }

    // View Messages
    public function getmessage()
    {
        $this->db->select('message.id AS id,
		message.content AS content,
		a1.nama_admin AS from_users,
		a2.nama_admin AS to_admin,
		message.date AS date
		');
        $this->db->from('message');
        $this->db->join('users a1', 'message.from_users=a1.id', 'inner');
        $this->db->join('users a2', 'message.to_admin=a2.id', 'inner');
        $this->db->where('from_users', $this->session->userdata('id'));
        $this->db->or_where('to_admin', $this->session->userdata('id'));
        $this->db->order_by('message.date', 'DESC');
        $this->db->limit(10);

        $query = $this->db->get();
        return $query;
    }

    // View Users
    public function view()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query;
    }

    // View Users
    public function viewanggota()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id', 'DESC');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query;
    }

    // Insert Message
    public function insert_messages($input)
    {
        return $this->db->insert('message', $input);
    }

    public function get_umum()
    {
        $this->db->select('files.id AS id,
		files.file_name AS file_name,
		files.upload_name AS upload_name,
		a1.nama_admin AS uploaded_by,
		a2.nama_admin AS uploaded_to,
		files.uploaded_at AS uploaded_at
		');
        $this->db->from('files');
        $this->db->join('users a1', 'files.uploaded_by=a1.id', 'inner');
        $this->db->join('users a2', 'files.uploaded_to=a2.id', 'inner');
        $this->db->order_by('files.uploaded_at', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    // Sertificate File
    public function add_file($data)
    {
        return $this->db->insert('files', $data);
    }

    public function delete_file($id)
    {
        return $this->db->delete('files', ['id' => $id]);
    }

    // Menu
    public function insert_menu($input)
    {
        return $this->db->insert('menu', $input);
    }

    public function update_menu($id, $input)
    {
        return $this->db->where('id_menu', $id)->update('menu', $input);
    }

    public function delete_menu($id)
    {
        return $this->db->delete('menu', ['id_menu' => $id]);
    }
}

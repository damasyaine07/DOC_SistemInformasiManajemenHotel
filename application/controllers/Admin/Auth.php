<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('Login');
    }
    public function Cek()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong.!!');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login');
        } else{
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('password', $this->input->post('password'));
            $hasil = $this->db->get('users');
            if($hasil->row_array()>0){
                foreach($hasil->result() as $ketemu){
                   $session_data = array(
                       'username'  => $ketemu->username,
                       'role'   => $ketemu->role,
                       'nama'  => $ketemu->namauser,
                   );
                   $this->session->set_userdata($session_data);
                }
                $data=[
                    'title'     => 'Dashboard',
                    'judul'     => 'Dashboard',
                    'breadcrumb1' => 'Dashboard',
                ];
                redirect('Admin/Dashboard', $data);
            } else {
                $this->session->set_flashdata('pesan', 'Username atau password tidak ditemukan.!');
                redirect('Admin/Auth/');
            
            }

        }
    }
}
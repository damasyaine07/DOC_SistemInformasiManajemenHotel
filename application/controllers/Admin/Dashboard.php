<?php

class Dashboard extends CI_Controller
{
    public function Index()
    {
        $data=[
            'title'    => 'Hotelio | Dashboard',
            'judul'    => 'Dashboard',
            'subjudul' => 'Dashboard',
            'breadcrumbl'  => 'Dashboard'
        ];
        $this->load->view('Admin/Dashboard/Index');
    }
}

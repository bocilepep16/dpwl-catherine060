<?php
class Shopping extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        $this->load->view('layoutshop/headershop');
        $this->load->view('layoutshop/menushop');
        $this->load->view('layoutshop/slidershop', $dt);
    }
}
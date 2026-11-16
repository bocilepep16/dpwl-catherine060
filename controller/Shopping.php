<?php
class Shopping extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        $dt['EmPlg'] = $this->session->userdata('EmailPlg');
        $dt['NmPlg'] = $this->session->userdata('NmPlg');
        $dt['psn'] = $this->session->set_flashdata('pesan');
        $this->load->view('layoutshop/headershop', $dt);
        $this->load->view('layoutshop/menushop');
        $this->load->view('layoutshop/slidershop', $dt);
        $this->load->view('layoutshop/contentshop', $dt);
        $this->load->view('layoutshop/footershop');
    }

    public function detail($no_plat)
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['mobil'] = $cekdata->getMobilByPlat($no_plat);
        $dt['EmpLg'] = $this->session->userdata('EmailPlg');
        $dt['NmPlg'] = $this->session->userdata('NmPlg');

        $this->load->view('layoutshop/headershop', $dt);
        $this->load->view('layoutshop/menushop');
        $this->load->view('v_master_Shop/detail_mobil_view', $dt);
        $this->load->view('layoutshop/footershop');
    }
}
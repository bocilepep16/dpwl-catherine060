<?php
class Mobil_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_mobil()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }  

    public function simpan()
    {
    $mobil = $this->load->model('m_master/Mobil_M');
    if ($mobil->cekplat($this->load->post('no_plat'))) {
        echo "<script>
            alert('Nomor plat sudah terdaftar!');
            window.history.back();
        </script>";
        exit;
    }
}
} 
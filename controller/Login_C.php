<?php
class Login_C extends Controller
{
    public function index()
    {
        $sisipns['psn'] = $this->session->set_flashdata('pesan');
        $this->load->view('login', $sisipns);
    }

    public function penyewa()
    {
        $this->session->set_userdata('userplg', 'penyewa');
        $this->load->view('login');
    }

    public function CekLogin()
    {
        if (!empty($this->session->userdata('userplg'))) {
            $email = $this->load->post('email');
            $password = $this->load->post('pass');
            $cekdata = $this->load->model('LoginPlg_M');
            $datauser = $cekdata->DataPlg($email);
            if ($datauser && password_verify($password, $datauser['sandi'])) {
                $this->session->set_userdata('EmailPlg', $email);
                $this->session->set_userdata('NmPlg', $datauser['nm_lngkp']);
                $this->session->set_flashdata('pesan', 'Login berhasil...');
                redirect('Shopping/index');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek user, password Anda...');
                redirect('login_C/penyewa');
            }
            exit();
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('userplg');
        $this->session->unset_userdata('EmailPlg');
        $this->session->unset_userdata('NmPlg');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('Shopping/index');
        exit;
    }
}
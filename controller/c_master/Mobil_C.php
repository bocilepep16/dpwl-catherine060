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

    $ft_depan = 'Depan' . $this->load->post('no_plat');
    $ft_blkng = 'Belakang' . $this->load->post('no_plat');
    $ft_interior = 'Interior' . $this->load->post('no_plat');

    $folder = dirname(__DIR__, 2) . '/img/';
    if (!is_dir($folder)) {mkdir($folder, 0775, true);}
    $nmgambar = $_FILES['ft_depan']['tmp_name'];
    $ekstensi = explode(".", $_FILES['ft_depan']['name']);
    $ekstensi = strtolower(end($ekstensi));
    $ft_depan = $ft_depan . '.' . $ekstensi;
    $target_dir = $folder . $ft_depan;
    if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
        echo "<script>alert('Gagal simpan gambar depan, format jpg, png, dan jpeg..!');</script>";
    } else {
        move_uploaded_file($nmgambar, $target_dir);
    }

    $folder = dirname(__DIR__, 2) . '/img/';
    if (!is_dir($folder)) {mkdir($folder, 0775, true);}
    $nmgambar = $_FILES['ft_blkng']['tmp_name'];
    $ekstensi = explode(".", $_FILES['ft_blkng']['name']);
    $ekstensi = strtolower(end($ekstensi));
    $ft_blkng = $ft_blkng . '.' . $ekstensi;
    $target_dir = $folder . $ft_blkng;
    if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
        echo "<script>alert('Gagal simpan gambar belakang, format jpg, png, dan jpeg..!');</script>";
    } else {
        move_uploaded_file($nmgambar, $target_dir);
    }

    $folder = dirname(__DIR__, 2) . '/img/';
    if (!is_dir($folder)) {mkdir($folder, 0775, true);}
    $nmgambar = $_FILES['ft_interior']['tmp_name'];
    $ekstensi = explode(".", $_FILES['ft_interior']['name']);
    $ekstensi = strtolower(end($ekstensi));
    $ft_interior = $ft_interior . '.' . $ekstensi;
    $target_dir = $folder . $ft_interior;
    if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
        echo "<script>alert('Gagal simpan gambar interior, format jpg, png, dan jpeg..!');</script>";
    } else {
        move_uploaded_file($nmgambar, $target_dir);
    }
    
    $data = [
        'no_plat' => $this->load->post('no_plat'),
        'nm_mobil' => $this->load->post('nm_mobil'),
        'nkursi' => $this->load->post('nkursi'),
        'nbagasi' => $this->load->post('nbagasi'),
        'jns_mobil' => $this->load->post('jns_mobil'),
        'transmisi' => $this->load->post('transmisi'),
        'thn_buat' => $this->load->post('thn_buat'),
        'ft_depan' => $ft_depan,
        'ft_blkng' => $ft_blkng,
        'ft_interior' => $ft_interior,
        'hrg_hari' => $this->load->post('hrg_hari'),
        'cttn_unit' => $this->load->post('cttn_unit'),
        'status_unit' => $this->load->post('status_unit')
    ];

    $simpan = $mobil->simpan($data);

    if ($simpan) {
        echo "<script>
            alert('Data mobil berhasil disimpan!');
            window.location.href = '" . base_url('Mobil_C/index') . "';
        </script>";
    } else {
        echo "<script>
            alert('Data mobil gagal disimpan!');
            window.history.back();
        </script>";
        }
    }
} 
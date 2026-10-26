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
    $ft_blkg = 'Belakang' . $this->load->post('no_plat');
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
    $nmgambar = $_FILES['ft_blkg']['tmp_name'];
    $ekstensi = explode(".", $_FILES['ft_blkg']['name']);
    $ekstensi = strtolower(end($ekstensi));
    $ft_blkg = $ft_blkg . '.' . $ekstensi;
    $target_dir = $folder . $ft_blkg;
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
        'ft_blkg' => $ft_blkg,
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

    public function edit_mobil($no_plat = null)
    {
        if ($no_plat === null || $no_plat === '') {
            echo "<script>
                alert('Nomor plat tidak ditemukan!');
                window.location.href = '" .
                base_url('Mobil_C/index') . "';
            </script>";
            return;
        }

        $mobil = $this->load->model('m_master/Mobil_M');

        $data['mobil'] = $mobil->getMobilByPlat($no_plat);

        if (!$data['mobil']) {
            echo "<script>
                alert('Data mobil tidak ditemukan!');
                window.location.href = '" .
                base_url('Mobil_C/index') . "';
            </script>";
            return;
        }

        $info['nm_user'] =
            explode('@', $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/edit_mobilview', $data);
        $this->load->view('layout/footer');
    }

    
    public function update_mobil()
    {
        $no_plat = $this->load->post('no_plat');

        if (empty($no_plat)) {
            echo "<script> alert('Nomor plat tidak boleh kosong!'); window.history.back(); </script>";
            return;
        }

        $mobil = $this->load->model('m_master/Mobil_M');
        $lama = $mobil->getMobilByPlat($no_plat);

        if (!$lama) {
            echo "<script> alert('Data mobil tidak ditemukan!');
                window.location.href = '" . base_url('Mobil_C/index') . "'; </script>";
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }
        // Foto lama digunakan jika tidak ada foto baru.
        $foto = [
            'ft_depan' => $lama['ft_depan'],
            'ft_blkg' => $lama['ft_blkg'],
            'ft_interior' => $lama['ft_interior']
        ];

        $fields = ['ft_depan', 'ft_blkg', 'ft_interior'];

        foreach ($fields as $field) {
            if (
                !isset($_FILES[$field]) ||
                $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE
            ) {
                continue;
            }

            if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
                echo "<script>
                    alert('Upload foto gagal!');
                    window.history.back();
                </script>";
                return;
            }

            $ext = strtolower(
                pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION)
            );

            if (!in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
                echo "<script>
                    alert('Foto harus berformat JPG, JPEG, atau PNG!');
                    window.history.back();
                </script>";
                return;
            }

            $nama = $field . '_' .
                preg_replace('/[^A-Za-z0-9_-]/', '', $no_plat) .
                '_' . uniqid() . '.' . $ext;

            if (!move_uploaded_file($_FILES[$field]['tmp_name'], $folder . $nama)) {
                echo "<script> alert('Foto gagal disimpan!'); window.history.back(); </script>"; 
                return;
                }

            $foto[$field] = $nama;
        }

        $data = [
            'no_plat' => $no_plat,
            'nm_mobil' => $this->load->post('nm_mobil'),
            'nkursi' => $this->load->post('nkursi'),
            'nbagasi' => $this->load->post('nbagasi'),
            'jns_mobil' => $this->load->post('jns_mobil'),
            'transmisi' => $this->load->post('transmisi'),
            'thn_buat' => $this->load->post('thn_buat'),
            'ft_depan' => $foto['ft_depan'],
            'ft_blkg' => $foto['ft_blkg'],
            'ft_interior' => $foto['ft_interior'],
            'hrg_hari' => $this->load->post('hrg_hari'),
            'cttn_unit' => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $hasil = $mobil->ubah($data);

        if ($hasil) {
            echo "<script>
                alert('Data mobil berhasil diperbarui!');
                window.location.href = '" .
                base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal diperbarui!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt = $mobil->getMobilByPlat($no_plat);
        $ft_depan = $dt['Gambar_Mobil']['ft_depan'];
        $ft_blkg = $dt['Gambar_Mobil']['ft_blkg'];
        $ft_interior = $dt['Gambar_Mobil']['ft_interior'];

        $hapus = $mobil->HapusDtMobil($no_plat);

        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';
            $gambar = [$ft_depan, $ft_blkg, $ft_interior];

            foreach ($gambar as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }

            echo "<script>
                alert('Data mobil berhasil dihapus!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal dihapus!');
                window.history.back();
            </script>";
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('login_C/index');
        exit;
    }
} 
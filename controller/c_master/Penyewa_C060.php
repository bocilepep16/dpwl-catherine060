
<?php
class Penyewa_C060 extends Controller
{
    public function index()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M060');
        $dt['dtpenyewa'] = $penyewa->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/penyewaview060', $dt);
        $this->load->view('layout/footer');
    }

    public function create_penyewa()
    {
        $info['nm_user'] = explode('@',
            $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview060');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M060');
        $username = $this->load->post('user_plg060');

        if ($penyewa->cekusername($username)) {
            echo "<script>
                alert('Username sudah terdaftar!');
                window.history.back();
            </script>";
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $foto = [
            'ft_ktp060' => '',
            'ft_sim_a060' => ''
        ];

        foreach ($foto as $field => $nama) {
            if (!isset($_FILES[$field]) ||
                $_FILES[$field]['error'] != UPLOAD_ERR_OK) {
                echo "<script>
                    alert('Foto KTP dan SIM A wajib diunggah!');
                    window.history.back();
                </script>";
                return;
            }

            $ext = strtolower(pathinfo(
                $_FILES[$field]['name'],
                PATHINFO_EXTENSION
            ));

            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                echo "<script>
                    alert('Foto harus berformat JPG, JPEG, atau PNG!');
                    window.history.back();
                </script>";
                return;
            }

            $namaFile = $field . '_' .
                preg_replace('/[^A-Za-z0-9_-]/', '', $username) .
                '_' . uniqid() . '.' . $ext;

            if (!move_uploaded_file(
                $_FILES[$field]['tmp_name'],
                $folder . $namaFile
            )) {
                echo "<script>
                    alert('Foto gagal disimpan!');
                    window.history.back();
                </script>";
                return;
            }

            $foto[$field] = $namaFile;
        }

        $data = [
            'user_plg060' => $username,
            'sandi060' => $this->load->post('sandi060'),
            'nik060' => $this->load->post('nik060'),
            'nm_lngkp060' => $this->load->post('nm_lngkp060'),
            'no_hp060' => $this->load->post('no_hp060'),
            'almt_lngkp060' => $this->load->post('almt_lngkp060'),
            'ft_ktp060' => $foto['ft_ktp060'],
            'ft_sim_a060' => $foto['ft_sim_a060']
        ];

        if ($penyewa->simpan($data)) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" .
                base_url('Penyewa_C060/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit_penyewa($username = null)
    {
        if ($username === null || $username === '') {
            redirect('Penyewa_C060/index');
            return;
        }

        $penyewa = $this->load->model('m_master/Penyewa_M060');
        $data['penyewa'] = $penyewa->getPenyewaByUsername($username);

        if (!$data['penyewa']) {
            echo "<script>
                alert('Data penyewa tidak ditemukan!');
                window.location.href = '" .
                base_url('Penyewa_C060/index') . "';
            </script>";
            return;
        }

        $info['nm_user'] = explode('@',
            $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview060', $data);
        $this->load->view('layout/footer');
    }

    public function update_penyewa()
    {
        $username = $this->load->post('user_plg060');

        $penyewa = $this->load->model('m_master/Penyewa_M060');
        $lama = $penyewa->getPenyewaByUsername($username);

        if (!$lama) {
            echo "<script>
                alert('Data penyewa tidak ditemukan!');
                window.history.back();
            </script>";
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $foto = [
            'ft_ktp060' => $lama['ft_ktp060'],
            'ft_sim_a060' => $lama['ft_sim_a060']
        ];

        foreach (['ft_ktp060', 'ft_sim_a060'] as $field) {
            if (!isset($_FILES[$field]) ||
                $_FILES[$field]['error'] == UPLOAD_ERR_NO_FILE) {
                continue;
            }

            if ($_FILES[$field]['error'] != UPLOAD_ERR_OK) {
                echo "<script>
                    alert('Upload foto gagal!');
                    window.history.back();
                </script>";
                return;
            }

            $ext = strtolower(pathinfo(
                $_FILES[$field]['name'],
                PATHINFO_EXTENSION
            ));

            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                echo "<script>
                    alert('Foto harus JPG, JPEG, atau PNG!');
                    window.history.back();
                </script>";
                return;
            }

            $namaFile = $field . '_' .
                preg_replace('/[^A-Za-z0-9_-]/', '', $username) .
                '_' . uniqid() . '.' . $ext;

            if (!move_uploaded_file(
                $_FILES[$field]['tmp_name'],
                $folder . $namaFile
            )) {
                echo "<script>
                    alert('Foto gagal disimpan!');
                    window.history.back();
                </script>";
                return;
            }

            $foto[$field] = $namaFile;
        }

        $data = [
            'user_plg060' => $username,
            'sandi060' => $this->load->post('sandi060'),
            'nik060' => $this->load->post('nik060'),
            'nm_lngkp060' => $this->load->post('nm_lngkp060'),
            'no_hp060' => $this->load->post('no_hp060'),
            'almt_lngkp060' => $this->load->post('almt_lngkp060'),
            'ft_ktp060' => $foto['ft_ktp060'],
            'ft_sim_a060' => $foto['ft_sim_a060']
        ];

        if ($penyewa->ubah($data)) {
            echo "<script>
                alert('Data penyewa berhasil diperbarui!');
                window.location.href = '" .
                base_url('Penyewa_C060/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diperbarui!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($username)
    {
        $penyewa = $this->load->model('m_master/Penyewa_M060');
        $dt = $penyewa->getPenyewaByUsername($username);

        if (!$dt) {
            echo "<script>
                alert('Data penyewa tidak ditemukan!');
                window.location.href = '" .
                base_url('Penyewa_C060/index') . "';
            </script>";
            return;
        }

        if ($penyewa->hapus($username)) {
            $folder = dirname(__DIR__, 2) . '/img/';

            foreach (['ft_ktp060', 'ft_sim_a060'] as $field) {
                $file = $dt[$field];

                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }

            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" .
                base_url('Penyewa_C060/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.history.back();
            </script>";
        }
    }
}

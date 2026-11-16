<?php
class Sewa_C extends Controller
{
    public function simpan($no_plat)
    {
        // Ambil email pelanggan dari session
        $email = $this->session->userdata('EmailPlg');
        if (!$email) {
            echo "<script>
                alert('Silakan login terlebih dahulu!');
                window.history.back();
            </script>";
            exit;
        }

        $sewa = $this->load->model('m_shop/Sewa_M');
        $kode = $sewa->buat_kode_sewa();
        // HEADER: Tabel sewa
        $data_sewa = [
            'kode_sewa'   => $kode,
            'tgl_mulai'   => date('Y-m-d'),
            'tgl_selesai' => date('Y-m-d'),
            'status_sewa' => 'Keranjang',
            'user_plg'    => $email
        ];
        $hasil = $sewa->simpan($data_sewa);

        if ($hasil !== false) {
            echo "<script>
        alert('Mobil berhasil dimasukkan ke keranjang!');
        window.location.href = '" . base_url('shopping') . "';
    </script>";
            exit;
        } else {
            echo "<script>
        alert('Gagal menyimpan data penyewaan!');
        window.history.back();
    </script>";
            exit;
        }
    }
}




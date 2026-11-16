<?php
class Sewa_M extends Model
{
    // Membuat kode sewa otomatis
    public function buat_kode_sewa()
    {
        $sql = $this->db->prepare(
            "SELECT MAX(CAST(SUBSTRING(kode_sewa, 3) AS UNSIGNED)) AS nomor
             FROM sewa"
        );
        $sql->execute();
        $hasil = $sql->get_result()->fetch_assoc();
        $nomor = ($hasil['nomor'] !== null)
            ? (int) $hasil['nomor'] + 1
            : 1;
        return 'SW' . str_pad($nomor, 5, '0', STR_PAD_LEFT);
    }
    // Simpan header 
    public function simpan($data_sewa)
    {
        // Simpan HEADER ke tabel sewa
        $sql = $this->db->prepare(
            "INSERT INTO sewa
        (kode_sewa, tgl_mulai, tgl_selesai, status_sewa, user_plg)
        VALUES (?, ?, ?, ?, ?)"
        );
        $sql->bind_param(
            "sssss",
            $data_sewa['kode_sewa'],
            $data_sewa['tgl_mulai'],
            $data_sewa['tgl_selesai'],
            $data_sewa['status_sewa'],
            $data_sewa['user_plg']
        );
        if ($sql->execute()) {
            return $data_sewa['kode_sewa'];
        } else {
            return false;
        }
    }
}




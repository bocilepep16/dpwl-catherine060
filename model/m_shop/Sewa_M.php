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

    // Simpan Detail
    public function simpandetail($data_pilih)
    {
        // Simpan HEADER ke tabel sewa
        $sql = $this->db->prepare(
            "INSERT INTO pilih
            (kode_sewa, no_plat, hrg_sewa, n_hari)
            VALUES (?, ?, ?, ?)"
        );
        $sql->bind_param(
            "ssdi",
            $data_pilih['kode_sewa'],
            $data_pilih['no_plat'],
            $data_pilih['hrg_sewa'],
            $data_pilih['n_hari']
        );
        if ($sql->execute()) {
            return $data_pilih['kode_sewa'];
        } else {
            return false;
        }
    }

    public function CekTransaksi($email)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM sewa WHERE user_plg=? and status_sewa='Keranjang'"
        );
        $sql->bind_param("s", $email);
        $sql->execute();
        $hasil = $sql->get_result();
        $data = $hasil->fetch_assoc();

        return $data ? $data['kode_sewa'] : false;
    }

    public function CekDataPilih($kode, $no_plat)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM pilih where kode_sewa=? and no_plat=?"
        );
        $sql->bind_param("ss", $kode, $no_plat);
        $sql->execute();
        $hasil = $sql->get_result();
        $data = $hasil->fetch_assoc();
        return $data ? $data['kode_sewa'] : false;
    }

    public function DataKeranjang($email)
    {
        $sql = $this->db->prepare(
            "SELECT sewa.kode_sewa, COUNT(pilih.no_plat) AS jumlah
            FROM sewa
            INNER JOIN pilih ON sewa.kode_sewa = pilih.kode_sewa
            WHERE sewa.user_plg = ?
            AND sewa.status_sewa = 'Keranjang'
            GROUP BY sewa.kode_sewa"
        );
        $sql->bind_param("s", $email);
        $sql->execute();
        $hasil = $sql->get_result();
        $data = $hasil->fetch_assoc();
        return $data ? $data['jumlah'] : 0;
    }

    public function DtKeranjang($email)
    {
        $sql = "SELECT pilih.no_plat, pilih.kode_sewa, pilih.n_hari, mobil.nm_mobil, mobil.hrg_hari,
                    mobil.ft_depan, sewa.tgl_mulai, sewa.tgl_selesai, sewa.wkt_ambil, sewa.status_sewa
                FROM pilih
                JOIN mobil ON pilih.no_plat = mobil.no_plat
                JOIN sewa ON pilih.kode_sewa = sewa.kode_sewa
                WHERE sewa.user_plg = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $hasil;
    }

    public function HapusDtKeranjang($no_plat, $kode_sewa)
    {
        $dtmobil = $this->db->prepare("DELETE FROM pilih WHERE no_plat = ? and kode_sewa = ?");
        $dtmobil->bind_param("ss", $no_plat, $kode_sewa);
        $hasil = $dtmobil->execute();
        $dtmobil->close();
        return $hasil;
    }

    public function UpdateKeranjang($data)
    {
        // Update tabel sewa
        $stmt1 = $this->db->prepare("UPDATE sewa SET tgl_mulai = ?, tgl_selesai = ?, wkt_ambil = ? WHERE kode_sewa = ?");
        $stmt1->bind_param(
            "ssss",
            $data['tgl_mulai'],
            $data['tgl_selesai'],
            $data['wkt_ambil'],
            $data['kode_sewa']
        );
        $stmt1->execute();
        $stmt1->close();

        // Update tabel pilih
        $stmt2 = $this->db->prepare("UPDATE pilih SET n_hari = ? WHERE kode_sewa = ?");
        $stmt2->bind_param(
            "is",
            $data['n_hari'],
            $data['kode_sewa']
        );
        $stmt2->execute();
        $stmt2->close();
        $this->db->commit();
        return true;
    }
}




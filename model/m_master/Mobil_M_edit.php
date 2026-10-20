<?php
class Mobil_M extends Model
{
    public function datamobil()
    {
        $sql = $this->db->prepare(
            "SELECT no_plat, nm_mobil, nkursi, nbagasi, jns_mobil, transmisi,
                    thn_buat, ft_depan, ft_blkg, ft_interior, hrg_hari,
                    cttn_unit, status_unit
             FROM mobil"
        );
        $sql->execute();
        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getMobilByPlat($no_plat)
    {
        $sql = $this->db->prepare(
            "SELECT no_plat, nm_mobil, nkursi, nbagasi, jns_mobil, transmisi,
                    thn_buat, ft_depan, ft_blkg, ft_interior, hrg_hari,
                    cttn_unit, status_unit
             FROM mobil WHERE no_plat = ?"
        );
        $sql->bind_param("s", $no_plat);
        $sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    public function ubah($data)
    {
        $sql = $this->db->prepare(
            "UPDATE mobil SET
                nm_mobil = ?, nkursi = ?, nbagasi = ?, jns_mobil = ?,
                transmisi = ?, thn_buat = ?, ft_depan = ?, ft_blkg = ?,
                ft_interior = ?, hrg_hari = ?, cttn_unit = ?, status_unit = ?
             WHERE no_plat = ?"
        );

        if (!$sql) {
            return false;
        }

        $sql->bind_param(
            "siissssssdsss",
            $data['nm_mobil'],
            $data['nkursi'],
            $data['nbagasi'],
            $data['jns_mobil'],
            $data['transmisi'],
            $data['thn_buat'],
            $data['ft_depan'],
            $data['ft_blkg'],
            $data['ft_interior'],
            $data['hrg_hari'],
            $data['cttn_unit'],
            $data['status_unit'],
            $data['no_plat']
        );

        return $sql->execute();
    }
}

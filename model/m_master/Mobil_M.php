<?php
class Mobil_M extends Model
{
    function datamobil()
    {
        $dtmobil = $this->db->prepare("SELECT no_plat, nm_mobil, nkursi, nbagasi, jns_mobil, transmisi,
        thn_buat, ft_depan, ft_blkg, ft_interior, hrg_hari, cttn_unit, status_unit FROM mobil");
        $dtmobil->execute();
        return $dtmobil->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekplat($no_plat)
    {
    $sql = $this->db->prepare("SELECT no_plat FROM mobil WHERE no_plat = ?");
    $sql->bind_param("s", $no_plat);
    $sql->execute();
    $hasil = $sql->get_result();
    return $hasil->num_rows > 0;
    }
}
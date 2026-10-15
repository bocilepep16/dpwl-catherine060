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
}
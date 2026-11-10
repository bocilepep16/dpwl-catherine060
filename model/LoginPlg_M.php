<?php
class LoginPlg_M extends Model
{
    function DataPlg($email)
    {
        $dtadmin = $this->db->prepare("select user_plg060, sandi060, nm_lngkp060
            from penyewa where user_plg060=?");
        $dtadmin->bind_param("s", $email);
        $dtadmin->execute();
        return $dtadmin->get_result()->fetch_assoc();
    }
}
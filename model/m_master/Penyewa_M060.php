
<?php
class Penyewa_M060 extends Model
{
    public function datapenyewa()
    {
        $sql = $this->db->prepare(
            "SELECT user_plg060, nik060, nm_lngkp060,
                    no_hp060, almt_lngkp060,
                    ft_ktp060, ft_sim_a060
             FROM penyewa"
        );

        $sql->execute();
        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekusername($username)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg060 FROM penyewa
             WHERE user_plg060 = ?"
        );

        $sql->bind_param("s", $username);
        $sql->execute();

        return $sql->get_result()->num_rows > 0;
    }

    public function simpan($data)
    {
        $sql = $this->db->prepare(
            "INSERT INTO penyewa
            (user_plg060, sandi060, nik060, nm_lngkp060,
             no_hp060, almt_lngkp060, ft_ktp060, ft_sim_a060)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $sql->bind_param(
            "ssssssss",
            $data['user_plg060'],
            $data['sandi060'],
            $data['nik060'],
            $data['nm_lngkp060'],
            $data['no_hp060'],
            $data['almt_lngkp060'],
            $data['ft_ktp060'],
            $data['ft_sim_a060']
        );

        return $sql->execute();
    }

    public function getPenyewaByUsername($username)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg060, sandi060, nik060,
                    nm_lngkp060, no_hp060, almt_lngkp060,
                    ft_ktp060, ft_sim_a060
             FROM penyewa
             WHERE user_plg060 = ?"
        );

        $sql->bind_param("s", $username);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    public function ubah($data)
    {
        $sql = $this->db->prepare(
            "UPDATE penyewa SET
             sandi060 = ?, nik060 = ?, nm_lngkp060 = ?,
             no_hp060 = ?, almt_lngkp060 = ?,
             ft_ktp060 = ?, ft_sim_a060 = ?
             WHERE user_plg060 = ?"
        );

        $sql->bind_param(
            "ssssssss",
            $data['sandi060'],
            $data['nik060'],
            $data['nm_lngkp060'],
            $data['no_hp060'],
            $data['almt_lngkp060'],
            $data['ft_ktp060'],
            $data['ft_sim_a060'],
            $data['user_plg060']
        );

        return $sql->execute();
    }

    public function hapus($username)
    {
        $sql = $this->db->prepare(
            "DELETE FROM penyewa WHERE user_plg060 = ?"
        );

        $sql->bind_param("s", $username);
        $hasil = $sql->execute();
        $sql->close();

        return $hasil;
    }
}

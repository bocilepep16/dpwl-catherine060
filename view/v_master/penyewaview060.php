
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>DATA PENYEWA</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('Penyewa_C060/create_penyewa') ?>"
                       class="btn btn-primary mb-3">
                        <i class="fas fa-user-plus"></i>
                        Tambah Data Penyewa
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. HP</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Foto Identitas<br>(KTP & SIM A)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($dtpenyewa as $p): ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($p['user_plg060']) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($p['nik060']) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($p['nm_lngkp060']) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($p['no_hp060']) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($p['almt_lngkp060']) ?>
                                        </td>
                                        <td>
                                            <b>KTP:</b><br>
                                            <?php if (!empty($p['ft_ktp060'])): ?>
                                                <img
                                                    src="<?= base_url('img/' . rawurlencode($p['ft_ktp060'])) ?>"
                                                    alt="Foto KTP"
                                                    style="width:80px; height:55px; object-fit:contain"
                                                    class="img-thumbnail">
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>

                                            <br><b>SIM A:</b><br>
                                            <?php if (!empty($p['ft_sim_a060'])): ?>
                                                <img
                                                    src="<?= base_url('img/' . rawurlencode($p['ft_sim_a060'])) ?>"
                                                    alt="Foto SIM A"
                                                    style="width:80px; height:55px; object-fit:contain"
                                                    class="img-thumbnail">
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('Penyewa_C060/edit_penyewa/' . rawurlencode($p['user_plg060'])) ?>"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="<?= base_url('Penyewa_C060/hapus/' . rawurlencode($p['user_plg060'])) ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

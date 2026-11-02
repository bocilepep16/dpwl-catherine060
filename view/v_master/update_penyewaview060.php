
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Data Penyewa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Penyewa</h3>
                </div>

                <form action="<?= base_url('Penyewa_C060/update_penyewa') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   name="user_plg060"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['user_plg060'], ENT_QUOTES, 'UTF-8') ?>"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password"
                                   name="sandi060"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['sandi060'], ENT_QUOTES, 'UTF-8') ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text"
                                   name="nik060"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['nik060'], ENT_QUOTES, 'UTF-8') ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                   name="nm_lngkp060"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['nm_lngkp060'], ENT_QUOTES, 'UTF-8') ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="text"
                                   name="no_hp060"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['no_hp060'], ENT_QUOTES, 'UTF-8') ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="almt_lngkp060"
                                      class="form-control"
                                      rows="3"
                                      required><?= htmlspecialchars($penyewa['almt_lngkp060'], ENT_QUOTES, 'UTF-8') ?></textarea>
                        </div>

                        <hr>
                        <h5>Dokumen Identitas</h5>

                        <?php foreach ([
                            'ft_ktp060' => 'Foto KTP',
                            'ft_sim_a060' => 'Foto SIM A'
                        ] as $field => $label): ?>

                            <div class="form-group">
                                <label><?= $label ?></label><br>

                                <?php if (!empty($penyewa[$field])): ?>
                                    <img
                                        src="<?= base_url('img/' . rawurlencode($penyewa[$field])) ?>"
                                        alt="<?= $label ?>"
                                        style="width:120px; height:90px; object-fit:contain"
                                        class="img-thumbnail mb-2">
                                    <br>
                                <?php endif; ?>

                                <input type="file"
                                       name="<?= $field ?>"
                                       class="form-control-file"
                                       accept=".jpg,.jpeg,.png">
                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti foto.
                                </small>
                            </div>

                        <?php endforeach; ?>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <a href="<?= base_url('Penyewa_C060/index') ?>"
                           class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

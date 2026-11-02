
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Update Data Penyewa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit"></i>
                        Form Update Data Penyewa
                    </h3>
                </div>

                <form action="<?= base_url('Penyewa_C060/update_penyewa') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username (User Pelanggan)</label>
                                    <input type="text"
                                           name="user_plg060"
                                           class="form-control"
                                           value="<?= htmlspecialchars($penyewa['user_plg060'], ENT_QUOTES, 'UTF-8') ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kata Sandi (Password)</label>
                                    <input type="password"
                                           name="sandi060"
                                           class="form-control"
                                           value="<?= htmlspecialchars($penyewa['sandi060'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text"
                                           name="nik060"
                                           class="form-control"
                                           maxlength="20"
                                           value="<?= htmlspecialchars($penyewa['nik060'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text"
                                           name="nm_lngkp060"
                                           class="form-control"
                                           value="<?= htmlspecialchars($penyewa['nm_lngkp060'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input type="text"
                                           name="no_hp060"
                                           class="form-control"
                                           maxlength="20"
                                           value="<?= htmlspecialchars($penyewa['no_hp060'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="almt_lngkp060"
                                              class="form-control"
                                              rows="3"
                                              placeholder="Masukkan alamat lengkap penyewa"
                                              required><?= htmlspecialchars($penyewa['almt_lngkp060'], ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>
                            <i class="fas fa-id-card"></i>
                            Dokumen Identitas
                        </h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto KTP (ft_ktp060)</label>

                                    <?php if (!empty($penyewa['ft_ktp060'])): ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode($penyewa['ft_ktp060'])) ?>"
                                                alt="Foto KTP"
                                                style="width:120px; height:90px; object-fit:contain"
                                                class="img-thumbnail">
                                        </div>
                                    <?php endif; ?>

                                    <input type="file"
                                           name="ft_ktp060"
                                           class="form-control-file"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG.
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto SIM A (ft_sim_a060)</label>

                                    <?php if (!empty($penyewa['ft_sim_a060'])): ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode($penyewa['ft_sim_a060'])) ?>"
                                                alt="Foto SIM A"
                                                style="width:120px; height:90px; object-fit:contain"
                                                class="img-thumbnail">
                                        </div>
                                    <?php endif; ?>

                                    <input type="file"
                                           name="ft_sim_a060"
                                           class="form-control-file"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG.
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <a href="<?= base_url('Penyewa_C060/index') ?>"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

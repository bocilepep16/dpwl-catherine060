<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Edit Data Mobil</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Mobil_C/index') ?>">Data Mobil</a></li>
                        <li class="breadcrumb-item active">Edit Mobil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Form Edit Data Mobil</h3>
                </div>

                <form action="<?= base_url('Mobil_C/update_mobil') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control"
                                           value="<?= htmlspecialchars($mobil['no_plat'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                           readonly required>
                                    <small class="text-muted">Nomor plat menjadi identitas data dan tidak dapat diubah di form ini.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="nm_mobil" class="form-control"
                                           value="<?= htmlspecialchars($mobil['nm_mobil'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input type="number" min="1" name="nkursi" class="form-control"
                                           value="<?= htmlspecialchars((string)($mobil['nkursi'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input type="number" min="0" name="nbagasi" class="form-control"
                                           value="<?= htmlspecialchars((string)($mobil['nbagasi'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Mobil</label>
                                    <select name="jns_mobil" class="form-control" required>
                                        <?php foreach (['MPV', 'SUV', 'Sedan', 'Hatchback'] as $jenis): ?>
                                            <option value="<?= $jenis ?>" <?= (($mobil['jns_mobil'] ?? '') === $jenis) ? 'selected' : '' ?>><?= $jenis ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi" class="form-control" required>
                                        <?php foreach (['Manual', 'Automatic'] as $trans): ?>
                                            <option value="<?= $trans ?>" <?= (($mobil['transmisi'] ?? '') === $trans) ? 'selected' : '' ?>><?= $trans ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Pembuatan</label>
                                    <input type="number" name="thn_buat" min="1900" max="<?= date('Y') + 1 ?>" class="form-control"
                                           value="<?= htmlspecialchars((string)($mobil['thn_buat'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                        <input type="number" name="hrg_hari" min="0" step="0.01" class="form-control"
                                               value="<?= htmlspecialchars((string)($mobil['hrg_hari'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Unit</label>
                                    <select name="status_unit" class="form-control" required>
                                        <?php foreach (['Aktif', 'Tidak Aktif'] as $status): ?>
                                            <option value="<?= $status ?>" <?= (($mobil['status_unit'] ?? '') === $status) ? 'selected' : '' ?>><?= $status ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5><i class="fas fa-camera"></i> Foto Mobil</h5>
                        <p class="text-muted">Pilih foto baru hanya jika ingin mengganti foto lama.</p>
                        <div class="row">
                            <?php
                            $fotoFields = [
                                'ft_depan' => 'Foto Depan',
                                'ft_blkg' => 'Foto Belakang',
                                'ft_interior' => 'Foto Interior'
                            ];
                            foreach ($fotoFields as $field => $label):
                                $namaFoto = $mobil[$field] ?? '';
                            ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?= $label ?></label>
                                        <?php if ($namaFoto !== ''): ?>
                                            <div class="mb-2">
                                                <img src="<?= base_url('img/' . rawurlencode($namaFoto)) ?>"
                                                     alt="<?= $label ?>" style="max-width:100%;height:140px;object-fit:cover"
                                                     class="img-thumbnail">
                                            </div>
                                        <?php else: ?>
                                            <p class="text-muted">Belum ada foto.</p>
                                        <?php endif; ?>
                                        <input type="file" name="<?= $field ?>" class="form-control-file" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="form-group">
                            <label>Catatan Unit</label>
                            <textarea name="cttn_unit" class="form-control" rows="3"><?= htmlspecialchars($mobil['cttn_unit'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        <a href="<?= base_url('Mobil_C/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

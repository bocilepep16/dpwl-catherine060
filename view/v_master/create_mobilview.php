<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">
                                Master Mobil
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Entri Mobil
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-car"></i>
                        Form Entri Data Mobil
                    </h3>
                </div>

                <form action="<?= base_url('Mobil_C/simpan') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">

                    <div class="row">

                            <!-- No Plat -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" placeholder="Contoh: BN 1234 AB" required>
                                </div>
                            </div>

                            <!-- Nama Mobil -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="nama_mobil" class="form-control" placeholder="Contoh: Toyota Avanza" required>
                                </div>
                            </div>

                            <!-- Jumlah Kursi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input type="number" name="jumlah_kursi" class="form-control" required>
                                </div>
                            </div>

                            <!-- Jumlah Bagasi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input type="number" name="jumlah_bagasi" class="form-control" required>
                                </div>
                            </div>

                            <!-- Jenis Mobil -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Mobil</label>
                                    <select name="jenis_mobil" class="form-control" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="MPV">MPV</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="Hatchback">Hatchback</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Transmisi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi" class="form-control" required>
                                        <option value="">-- Pilih Transmisi --</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tahun Pembuatan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Pembuatan</label>
                                    <input type="number" name="tahun_pembuatan" class="form-control" placeholder="Contoh: 2024" required>
                                </div>
                            </div>

                            <!-- Biaya Per Hari -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="biaya_per_hari" class="form-control" placeholder="Contoh: 350000" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Unit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Unit</label>
                                    <select name="status_unit" class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Disewa">Disewa</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <!-- Foto Mobil -->
                        <h5>
                            <i class="fas fa-camera"></i>
                            Foto Mobil
                        </h5>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Depan</label>
                                    <input type="file" name="foto_depan" class="form-control-file" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Belakang</label>
                                    <input type="file" name="foto_belakang" class="form-control-file" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Interior</label>
                                    <input type="file" name="foto_interior" class="form-control-file" accept="image/*">
                                </div>
                            </div>

                        </div>

                        <!-- Catatan Unit -->
                        <div class="form-group">
                            <label>Catatan Unit</label>
                            <textarea name="catatan_unit" class="form-control" rows="3" placeholder="Masukkan catatan mengenai kendaraan"></textarea>
                        </div>

                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>

                        <a href="<?= base_url('Mobil_C/index') ?>"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </section>

</div>
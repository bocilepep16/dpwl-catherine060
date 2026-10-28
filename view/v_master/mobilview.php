<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DATA MOBIL</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Dashboard') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Mobil
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= base_url('Mobil_C/create_mobil') ?>" class="btn btn-primary mb-3">
                                <i class="fas fa-car"></i> Tambah Data Mobil
                            </a>

                            <style>
                                .table-mobil-responsive {
                                    width: 100%;
                                    overflow-x: auto;
                                }

                                .table-mobil {
                                    width: 100%;
                                    margin-bottom: 0;
                                    font-size: 14px;
                                    table-layout: auto;
                                }

                                .table-mobil th,
                                .table-mobil td {
                                    padding: 8px 10px;
                                    vertical-align: middle;
                                    white-space: normal;
                                    overflow-wrap: break-word;
                                }

                                .table-mobil th {
                                    text-align: center;
                                    font-weight: 700;
                                }

                                .table-mobil .kolom-foto {
                                    min-width: 70px;
                                }

                                .table-mobil .kolom-aksi {
                                    min-width: 85px;
                                    white-space: nowrap;
                                }

                                .table-mobil .btn-sm {
                                    padding: 4px 8px;
                                    font-size: 12px;
                                    margin: 2px 0;
                                }

                                .foto-mobil {
                                    width: 120px;
                                    height: 75px;
                                    object-fit: contain;
                                    display: block;
                                    margin-bottom: 5px;
                                    cursor: zoom-in;
                                    transition: transform 0.2s;
                                }

                                .foto-mobil:hover {
                                    transform: scale(1.04);
                                }

                                .modal-gambar {
                                    display: none;
                                    position: fixed;
                                    z-index: 99999;
                                    inset: 0;
                                    width: 100%;
                                    height: 100%;
                                    background: rgba(0, 0, 0, 0.85);
                                    justify-content: center;
                                    align-items: center;
                                    padding: 20px;
                                }

                                .modal-gambar img {
                                    max-width: 90%;
                                    max-height: 85vh;
                                    object-fit: contain;
                                    background: white;
                                    border-radius: 8px;
                                    padding: 5px;
                                }

                                .tutup-gambar {
                                    position: absolute;
                                    top: 20px;
                                    right: 35px;
                                    color: white;
                                    font-size: 40px;
                                    cursor: pointer;
                                    line-height: 1;
                                }
                            </style>
    <div class="table-mobil-responsive">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>No. Plat</th>
                  <th>Nama Mobil</th>
                  <th>Jumlah Kursi</th>
                  <th>Jumlah Bagasi</th>
                  <th>Jenis Mobil/<br>Transmisi</th>
                  <th>Tahun</th>
                  <th>Foto</th>
                  <th>Biaya Perhari</th>
                  <th>Catatan Unit</th>
                  <th>Status Unit</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody> 
                <?php foreach ($dtmobil as $m) : ?>
                    <tr>
                        <td><?= $m['no_plat'] ?></td>
                        <td><?= $m['nm_mobil'] ?></td>
                        <td><?= $m['nkursi'] ?></td>
                        <td><?= $m['nbagasi'] ?></td>
                        <td><?= $m['jns_mobil'] . '<br>' . $m['transmisi'] ?></td>
                        <td><?= $m['thn_buat'] ?></td>
                        <td><img src="<?= base_url('img/' . $m['ft_depan']) ?>" style="width: 100px; height: auto;"><br>
                            <img src="<?= base_url('img/' . $m['ft_blkg']) ?>" style="width: 100px; height: auto;"><br>
                            <img src="<?= base_url('img/' . $m['ft_interior']) ?>" style="width: 100px; height: auto;"><br>
                        </td>
                        <td><?= $m['hrg_hari'] ?></td>
                        <td><?= $m['cttn_unit'] ?></td>
                        <td><?= $m['status_unit'] ?></td>
                        <td>
                            <a href="<?= base_url('Mobil_C/edit_mobil/' . urlencode($m['no_plat'])) ?>"
                            class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>

                            <a href="<?= base_url('Mobil_C/hapus/' . $m['no_plat']) ?>"
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

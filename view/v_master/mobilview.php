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
                        <td><?= $m['ft_depan'] ?? '' ?><br><?= $m['ft_blkg'] ?? '' ?><br><?= $m['ft_interior'] ?? '' ?></td>
                        <td><?= $m['hrg_hari'] ?></td>
                        <td><?= $m['cttn_unit'] ?></td>
                        <td><?= $m['status_unit'] ?></td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

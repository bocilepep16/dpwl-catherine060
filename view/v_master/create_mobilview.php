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
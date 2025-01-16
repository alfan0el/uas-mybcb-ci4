<?= $this->extend('dashboard/layout/index'); ?>
<?= $this->section('ViewDashboard'); ?>
<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0"><i>Profile</i></h3></div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Col-->
      <div class="col-md-6">
        <!--begin::Quick Example-->
        <div class="card card-outline mb-4">
          <!--begin::Form-->
          <form action="<?= base_url('/profile/update/'.session()->get('nasabah_id').'')?>" method="POST">
            <!--begin::Body-->
            <div class="card-body">
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>

                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success"><?= session('success') ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                        <label for="exampleNamaLengkap" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control"
                            name="namaLengkap"
                            id="exampleNamaLengkap"
                            value="<?= $nasabah['nama_lengkap']?>"
                            disabled                    
                        />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenisKelamin" id="jenisKelamin">
                            <option selected value="<?= $nasabah['jenis_kelamin']?>"><?= $nasabah['jenis_kelamin']?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="exampleTTL" class="form-label">Tempat Tanggal Lahir</label>
                            <input
                                type="text"
                                class="form-control"
                                name="tempatTglLahir"
                                id="exampleTTL"
                                value="<?= $nasabah['tempat_tgl_lahir']?>"                    
                            />
                            <div id="emailHelp" class="form-text">
                                *Contoh: Jakarta,19 Januari 1999
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" name="agama" id="agama">
                            <option selected value="<?= $nasabah['agama']?>"><?= $nasabah['agama']?></option>
                                <option value="Kristen">Kristen</option>
                                <option value="Islam">Islam</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamatLengkap" aria-label="With textarea"><?= $nasabah['alamat_lengkap']?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="nomorTelp" class="form-label">Nomor Telepon</label>
                            <input
                                type="number"
                                class="form-control"
                                name="nomorTelp"
                                id="nomorTelp"
                                value="<?= $nasabah['nomor_telepon']?>"                    
                            />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="exampleEmail" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="exampleEmail"
                                value="<?= $nasabah['email']?>"
                                disabled                    
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="exampleUsername" class="form-label">Username</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exampleUsername"
                                value="<?= $nasabah['username']?>"
                                disabled                  
                            />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="exampleNoRek" class="form-label">Nomor Rekening</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exampleNoRek"
                                value="<?= $nasabah['nomor_rekening']?>"
                                disabled                  
                            />
                            <div id="emailHelp" class="form-text">
                                *Nomor Rekening akan ter-generate otomatis ketika klik tombol save
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <!--end::Footer-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Quick Example-->
      </div>
      <!--end::Col-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->
<?= $this->endSection() ?>
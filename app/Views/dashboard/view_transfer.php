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
        <div class="col-sm-6"><h3 class="mb-0"><i>Transfer</i></h3></div>
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
          <form action="<?= base_url('/transfer/send/'.session()->get('nasabah_id').'')?>" method="POST">
          
            <!--begin::Body-->
            <div class="card-body">
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>

            <?php if (session()->has('success')): ?>
                <div class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>
              <div class="mb-4">
                <label for="exampleMyBalance" class="form-label">My Balance</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleMyBalance"
                    <?php 
                     $amount = $nasabah['saldo'];
                     $result = number_format($amount, 0, ",", ".")
                    ?>
                    value="Rp. <?= $result ?>"                    
                    disabled
                />
              </div>
              <div class="mb-4">
                <label for="nasabahTujuan" class="form-label">Transfer To</label>
                <select class="form-select" name="nasabahTujuan" id="nasabahTujuan" required>
                  <option selected disabled>Select</option>
                    <?php foreach ($nomorRekening as $rekening): ?>
                        <option value="<?= $rekening['nasabah_id'] ?>"><?= $rekening['nomor_rekening']?> - <?= $rekening['nama_lengkap']?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label for="validationCustom04" class="form-label">Amount</label>
                <div class="input-group">
                  <label class="input-group-text" for="exampleAmount">Rp. </label>
                  <input
                    type="number"
                    class="form-control"
                    id="exampleAmount"
                    name="amount"
                    required
                  />
                </div>
              </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Transfer</button>
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
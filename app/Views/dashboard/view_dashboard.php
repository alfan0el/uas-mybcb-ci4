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
        <div class="col-sm-6"><h3 class="mb-0"><i>Dashboard</i></h3></div>
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
      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-lg-3 col-6">
          <!--begin::Small Box Widget 1-->
          <div class="small-box ">
            <div class="inner">
                <p>Total Balance</p>
                <?php foreach ($nasabah as $datas) : ?>
                  <p><u><i><?=$datas['nomor_rekening']?></i></u></p>
                  <?php 
                  $amount = $datas['saldo'];
                  $result = number_format($amount, 0, ",", ".")
                  ?>
                  <h4 class="fw-bold">Rp. <?=$result?></h4>
                <?php endforeach; ?>
                <p class="last-30-days">Last 30 days</p>
            </div>
          </div>
          <!--end::Small Box Widget 1-->
        </div>
        <!--end::Col-->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->
<?= $this->endSection() ?>
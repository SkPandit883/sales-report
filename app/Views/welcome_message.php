<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">

  <!-- Content -->
  <div class="bg-white px-3 py-5 m-4 shadow-md rounded-md grid lg:grid-cols-5 xl:grid-cols-5 md:grid-cols-5 grid-cols-2 gap-4 ">

    <?php foreach ($categoryWithProductsCounts as $category) : ?>
      <div class="bg-blue-50 px-4 py-3 border-[1px] border-blue-300 rounded-lg shadow-lg">
        <h2 class="text-md capitalize font-bold text-[#696cff]"><?= esc($category->name) ?></h2>
        <h2><?= esc($category->count) ?> items</h2>
      </div>
    <?php endforeach ?>

  </div>
  <div class="flex flex-row bg-label-primary items-center justify-center bg-white px-3 mx-4 py-2 shadow-md rounded-md border-[1px] border-[#696cff]">
    <h2 class="text-xl ">Sales Report <strong class="ml-3"><?=date('Y-m-d')?></strong></h2>
  </div>
  <div class=" px-2 py-2 m-4 shadow-md rounded-md grid lg:grid-cols-2 xl:grid-cols-2 grid-cols-1 gap-4">
    <div class="table-responsive text-nowrap bg-white">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Category</th>
            <th> Quantity</th>
            <th> Amount</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $loop_count = 0; ?>
          <?php foreach ($categoryReports as $key => $report) : ?>
            <tr>
              <td><strong><?= esc(++$loop_count) ?></strong></td>
              <td class="capitalize"><i class="fab  fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($report->name) ?></strong></td>
              <td><?= $report->quantity ?></td>
              <td><span class="badge bg-label-primary me-1"><?= round($report->total_amount, 3) ?></span></td>
            </tr>

          <?php endforeach ?>


        </tbody>
      </table>
    </div>
    <div class="table-responsive text-nowrap bg-white">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $loop_count = 0; ?>
          <?php foreach ($productReports as $key => $report) : ?>
            <tr>
              <td><strong><?= esc(++$loop_count) ?></strong></td>
              <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($report->name) ?></strong></td>
              <td><?= $report->quantity ?></td>
              <td><span class="badge bg-label-primary me-1"><?= round($report->total_amount, 3) ?></span></td>

            </tr>

          <?php endforeach ?>


        </tbody>
      </table>
    </div>
  </div>


  <!-- / Content -->



  <div class="content-backdrop fade"></div>
</div>

<?= $this->endSection() ?>
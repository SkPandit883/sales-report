<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Basic Bootstrap Table -->
    <div class="card">


        <div class="flex flex-row items-center justify-between">
            <h5 class="card-header text-xl uppercase"> Category wise sales reports </h5>
            <h2 class="mr-10">Today :<?=date('Y-m-d')?></h2>
        </div>
        <div class="table-responsive text-nowrap">
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
                            <td><span class="badge bg-label-primary me-1"><?= round($report->total_amount,3) ?></span></td>
                        </tr>

                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
<?= $this->endSection() ?>
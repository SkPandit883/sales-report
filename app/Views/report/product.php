<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Basic Bootstrap Table -->
    <div class="card">


        <div class="flex flex-row items-center justify-between">
            <h5 class="card-header text-xl uppercase"> products wise sales reports </h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Total Items</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $loop_count = 0; ?>
                    <?php foreach ($productReports as $key => $report) : ?>
                        <tr>
                            <td><strong><?= esc(++$loop_count) ?></strong></td>
                            <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($report->name) ?></strong></td>
                            <td><?= $report->item_per_price ?></td>
                            <td>
                                <img style="height:65px;width:60px" src="/uploads/<?= $report->image?>" alt="" srcset="">
                            </td>
                            <td><?= $report->num_of_items ?></td>
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
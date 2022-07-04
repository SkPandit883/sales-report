<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Basic Bootstrap Table -->
    <div class="card">


        <div class="flex flex-row items-center justify-between">
            <h5 class="card-header text-xl uppercase"> All Time Sales </h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Sales ID</th>
                        <th>Customer</th>
                        <th>Sales At</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $loop_count = 0; ?>
                    <?php foreach ($sales as $key => $sale) : ?>
                        <tr>
                            <td><strong><?= esc(++$loop_count) ?></strong></td>
                            <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($sale["sale_id"]) ?></strong></td>
                            <td><?= $sale["customer"] ?></td>
                            <td><?= $sale["created"] ?></td>
                            <td><span class="badge bg-label-primary me-1"><?= round($sale["total_amount"], 3) ?></span></td>
                            <td>
                                <button type="button" class="p-2 bg-blue-50 hover:bg-blue-200 rounded-md shadow-md border-[1px] border-[#696cff] flex items-center justify-center" data-bs-toggle="modal" data-bs-target="<?php echo '#billModal-' . $sale['sale_id']; ?>">
                                    <img src="https://img.icons8.com/ios/25/000000/visible--v1.png" />
                                    <h2 class="ml-2 ">Bill</h2>
                                </button>
                            </td>
                            <div class="modal fade" id="<?php echo 'billModal-' . $sale['sale_id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Sales Detail</h5>
                                            <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal" aria-label="Close">
                                                <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                                            </button>
                                        </div>
                                        <hr>
                                        <div class="modal-body px-6">
                                            <?php foreach ($sale['sales_details'] as $detail) : ?>
                                                <div class="flex flex-row my-2 items-center justify-between px-24">
                                                    <div>
                                                        <h2><?=esc($detail['name'])?></h2>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <h2>Rs. <?=esc($detail['price_per_item'])?></h2>
                                                        <h2 class="mx-1">&times;</h2>
                                                        <h2 class="py-1 px-[9px] rounded-full text-white bg-[#696cff]"> <?=esc($detail['num_of_items'])?></h2>
                                                    </div>
                                                    <div>
                                                        <h2>Rs. <?=esc(round($detail['amount'],3))?></h2>
                                                    </div>

                                                </div>
                                                <div class="px-24 my-2">
                                                    <hr>
                                                </div>
                                            <?php endforeach ?>
                                            <div class="px-24 flex flex-row justify-end ">
                                                <div class="  bg-blue-100 text-xl border-[1px] border-[#696cff] px-4 py-1 rounded-md">
                                                    Total Rs. <?= $sale['total_amount'] ?>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
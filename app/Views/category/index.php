<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product Category</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                            <div class="col-sm-8 space-x-6 d-flex">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                                <button type="submit" class="btn btn-primary bg-[#696cff]">Send</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- modal -->


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">All Category</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Category</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular
                                        1</strong></td>
                                <td>Albert Cook</td>

                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                        <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/27/646CFC/external-edit-interface-kiranshastry-lineal-kiranshastry.png" />
                                    </button>
                                    <button type="button" class="text-red-500 text-2xl m" onclick="deleteRow('category-1')">
                                        <img src="https://img.icons8.com/ios/26/FF1111/delete-forever--v1.png" />
                                    </button>
                                </td>
                                <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />

                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                                                        <div class="col-sm-12 space-x-6 d-flex">
                                                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary bg-[#696cff]">Save
                                                            Changes </button>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
 
        <?= $this->endSection() ?>
<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">New Product</h5>
          <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal" aria-label="Close">
            <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <form method="post" action="<?= base_url('product') ?>" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="John Doe" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
                <div class="col-sm-10">
                  <select id="defaultSelect" name="category_id" class="form-select">
                    <?php foreach ($categories as $category) : ?>
                      <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone"> Price</label>
                <div class="col-sm-10">
                  <input type="number" name="price" id="basic-default-phone" class="form-control phone-mask" placeholder="1200" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone"> Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="image" id="formFile" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                <div class="col-sm-10">
                  <textarea id="basic-default-message" name="description" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label=" Description about products" aria-describedby="basic-icon-default-message2"></textarea>
                </div>
              </div>

              <div class="modal-footer mt-5">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="submit" class="btn btn-primary bg-[#696cff]">Save </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <?php
    if (session()->getFlashdata('success')) {
      echo  '<div class="alert mx-3 mt-3 alert-success alert-dismissible" role="alert">'
        . session()->getFlashdata('success') .
        '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    ?>
    <?php
    if (session()->getFlashdata('validation')) {
      echo '<div class=  "my-2 w-full ">
      <div class="bg-red-50 mx-3 p-3 border-red-400 border-[1px] rounded-md ">';
      foreach (session()->getFlashdata('validation') as $key => $error) {
        echo "<h1 class='text-red-600'>" . $error . "</h1>";
      }
      echo " </div>
     </div>";
    }
    ?>

    <div class="flex flex-row items-center justify-between">
      <h5 class="card-header">List of products</h5>
      <button type="button" data-bs-toggle="modal" data-bs-target="#addProductModal" class="btn btn-primary bg-[#696cff] mr-10">Add</button>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $loop_count = 0; ?>
          <?php foreach ($products as $key => $product) : ?>
            <?php $id = $product->id; ?>
            <tr>
              <td><strong><?= esc(++$loop_count) ?></strong></td>
              <td class="capitalize"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($product->product_name) ?></strong></td>
              <td><span class="badge bg-label-primary me-1"><?= $product->category_name ?></span></td>
              <td><?= $product->price ?></td>
              <td>
                <img style="height:65px;width:60px" src="/uploads/<?= $product->image ?>" alt="" srcset="">
              </td>
              <td><?= $product->description ?></td>
              <td>
                <button type="button " data-bs-toggle="modal" data-bs-target='<?php echo "#editProductModal-$id" ?>'>
                  <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/27/646CFC/external-edit-interface-kiranshastry-lineal-kiranshastry.png" />
                </button>

                <button type="button" class="text-red-500 text-2xl m" onclick='deleteRow("<?php echo "product/delete/$id" ?>")'>
                  <img src="https://img.icons8.com/ios/26/FF1111/delete-forever--v1.png" />
                </button>
                <div class="modal fade" id='<?php echo "editProductModal-$id" ?>' tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Product</h5>
                        <button type="button" class="btn-close text-gray-500" data-bs-dismiss="modal" aria-label="Close">
                          <img src="https://img.icons8.com/material-outlined/44/000000/multiply--v1.png" />
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card-body">
                          <form method="post" action="<?= base_url('product/update/' . $id) ?>" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" value="<?= $product->product_name ?>" placeholder="apple" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
                              <div class="col-sm-10">
                                <select id="defaultSelect" name="category_id" class="form-select">
                                  <?php foreach ($categories as $category) : ?>
                                    <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-phone"> Price</label>
                              <div class="col-sm-10">
                                <input type="number" value="<?= $product->price ?>" name="price" id="basic-default-phone" class="form-control phone-mask" placeholder="1200" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-phone"> Image</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="formFile" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                              <div class="col-sm-10">
                                <textarea id="basic-default-message" name="description" class="form-control" placeholder="Description about products" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"><?= $product->description ?></textarea>
                              </div>
                            </div>

                            <div class="modal-footer mt-5">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary bg-[#696cff]">Save </button>
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </td>
            </tr>

          <?php endforeach ?>


        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
<?= $this->endSection() ?>
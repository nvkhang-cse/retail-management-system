<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách nhóm khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/customergroup/loadcustomergroupadd") ?>">
          <button type="button" class="btn btn-primary float-right">+ Thêm nhóm khách hàng</button>
        </a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title text-primary">Thông tin nhóm khách hàng</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="customer_group_wrapper">
            <table id="customer_group_list_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Tên nhóm</th>
                  <th>Mô tả</th>
                  <th>Chiết khấu (%)</th>
                  <th>Số lượng khách hàng</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  <div class="modal fade" id="editCustomerGroupInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="editCustomerGroupForm" action="" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Thông tin nhóm khách hàng</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="customer_group_name">Tên nhóm khách hàng</label>
              <input type="text" class="form-control" id="customer_group_name" name="customer_group_name" placeholder="" required maxlength="50">
              <input type="text" class="form-control" name="customer_group_code" id="customer_group_code" value="" hidden>
            </div>
            <div class="form-group">
              <label for="customer_group_description">Mô tả</label>
              <textarea class="form-control" id="customer_group_description" name="customer_group_description" rows="5" placeholder=""></textarea>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="customer_group_discount">Chiết khấu (%)</label>
                  <input type="number" class="form-control" id="customer_group_discount" name="customer_group_discount" placeholder="" min="0" max="1000">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="customer_spend_from">Từ</label>
                  <input type="number" class="form-control" id="customer_spend_from" name="customer_spend_from" placeholder="Thiết lập số tiền đã mua từ" min="0">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="customer_spend_to">Đến</label>
                  <input type="number" class="form-control" id="customer_spend_to" name="customer_spend_to" placeholder="Thiết lập số tiền đã mua đến" min="0">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_group_created_at">Ngày tạo</label>
                  <input type="text" class="form-control" id="customer_group_created_at" name="customer_group_created_at" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="customer_group_updated_at">Ngày cập nhật</label>
                  <input type="text" class="form-control" id="customer_group_updated_at" name="customer_group_updated_at" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-customer-group-form">Lưu thông tin</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->
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
</section>
<!-- /.content -->
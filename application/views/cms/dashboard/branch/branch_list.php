<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách chi nhánh</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?= site_url("dashboard/branch/loadbranchadd") ?>">
          <button type="button" class="btn btn-primary float-right">+ Thêm chi nhánh</button>
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
            <h5 class="card-title text-primary">Thông tin chi nhánh</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="branch_wrapper">
            <table cellspacing="5" cellpadding="5" class="mb-4">
              <tbody>
                <tr>
                  <div class="form-outline">
                    <td class="p-0">Vai trò chi nhánh:</td>
                    <td>
                      <select class="form-control" id="branch-filter-central" aria-label="Default select example">
                        <option value="0" selected>Chọn vai trò</option>
                        <option value="1">Chi nhánh trung tâm</option>
                        <option value="2">Chi nhánh phụ</option>
                      </select>
                    </td>
                  </div>
                </tr>
                <tr>
                  <div class="form-outline">
                    <td class="p-0">Trạng thái:</td>
                    <td>
                      <select class="form-control" id="branch-filter-status" aria-label="Default select example">
                        <option value="" selected>Chọn trạng thái chi nhánh</option>
                        <option value="1">Mở bán</option>
                        <option value="0">Đóng cửa</option>
                      </select>
                    </td>
                  </div>
                </tr>
              </tbody>
            </table>


            <table id="branch_list_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Tên chi nhánh</th>
                  <th>Địa chỉ</th>
                  <th>Quận huyện</th>
                  <th>Thành phố</th>
                  <th>Số điện thoại</th>
                  <th>Vai trò</th>
                  <th>Trạng thái</th>
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

  <div class="modal fade" id="editBranchInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="editBranchForm" action="" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Thông tin chi nhánh</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="branch_name">Tên chi nhánh</label>
              <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="" required maxlength="50">
              <input type="text" class="form-control" name="branch_code" id="branch_code" value="" hidden>
            </div>
            <div class="form-group">
              <label for="branch_address">Địa chỉ cụ thể (Số nhà, Đường, Phường xã)</label>
              <input type="text" class="form-control" id="branch_address" name="branch_address" placeholder="" maxlength="250">
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_district">Quận huyện</label>
                  <input type="text" class="form-control" id="branch_district" name="branch_district" placeholder="" maxlength="50">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_city">Thành phố</label>
                  <input type="text" class="form-control" id="branch_city" name="branch_city" placeholder="" maxlength="50">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_phone">Số điện thoại chi nhánh</label>
                  <input type="text" class="form-control" id="branch_phone" name="branch_phone" placeholder="" maxlength="20">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_central">Vai trò chi nhánh</label>
                  <select class="form-control" id="branch_central" name="branch_central" required>
                    <option value="1">Chi nhánh trung tâm</option>
                    <option value="2">Chi nhánh phụ</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_status">Trạng thái</label>
                  <select class="form-control" id="branch_status" name="branch_status" required>
                    <option value="1">Mở cửa</option>
                    <option value="0">Đóng cửa</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_created_at">Ngày tạo</label>
                  <input type="text" class="form-control" id="branch_created_at" name="branch_created_at" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="branch_updated_at">Ngày cập nhật</label>
                  <input type="text" class="form-control" id="branch_updated_at" name="branch_updated_at" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-branch-form">Lưu thông tin</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->
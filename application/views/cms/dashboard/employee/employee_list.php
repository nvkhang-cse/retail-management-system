<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách nhân viên</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/employee/loademployeeadd") ?>">
                    <button type="button" class="btn btn-primary float-right">+ Thêm nhân viên</button>
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
                        <h5 class="card-title text-primary">Thông tin nhân viên</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="employee_wrapper">
                        <table cellspacing="5" cellpadding="5" class="mb-4">
                            <tbody>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Vai trò:</td>
                                        <td>
                                            <select class="form-control" id="employee-filter-permission" aria-label="Default select example">
                                                <option value="0" selected>Chọn vai trò</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Trạng thái:</td>
                                        <td>
                                            <select class="form-control" id="employee-filter-status" aria-label="Default select example">
                                                <option value="" selected>Chọn trạng thái chi nhánh</option>
                                                <option value="1">Đang làm</option>
                                                <option value="0">Đang nghỉ</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <table id="employee_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Email</th>
                                    <th>Tên nhân viên</th>
                                    <th>Trạng thái</th>
                                    <th>Địa chỉ</th>
                                    <th>Quận huyện</th>
                                    <th>Thành phố</th>
                                    <th>Số điện thoại</th>
                                    <th>Vai trò</th>
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

    <div class="modal fade" id="editEmployeeInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="editEmployeeForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin nhân viên</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_name">Tên nhân viên</label>
                                    <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="" required>
                                    <input type="text" class="form-control" name="employee_code" id="employee_code" value="" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="employee_phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="employee_phone" name="employee_phone" placeholder="" maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label for="employee_birthday">Ngày sinh</label>
                                    <input type="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control" id="employee_birthday" name="employee_birthday" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_email">Email đăng nhập</label>
                                    <input type="email" class="form-control" id="employee_email" name="employee_email" placeholder="" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="employee_password">Mật khẩu mới</label>
                                    <input type="text" class="form-control" id="employee_password" name="employee_password" placeholder="" maxlength="150">
                                </div>
                                <div class="form-group">
                                    <label for="employee_confirm">Nhập lại mật khẩu</label>
                                    <input type="text" class="form-control" id="employee_confirm" name="employee_confirm" placeholder="" maxlength="150">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employee_address">Địa chỉ</label>
                            <input type="text" class="form-control" id="employee_address" name="employee_address" placeholder="" maxlength="250">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_district">Quận huyện</label>
                                    <input type="text" class="form-control" id="employee_district" name="employee_district" placeholder="" maxlength="50">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_city">Thành phố</label>
                                    <input type="text" class="form-control" id="employee_city" name="employee_city" placeholder="" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employee_branch">Chi nhánh</label>
                                    <select class="form-control" id="employee_branch" name="employee_branch" required></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employee_permission">Vai trò</label>
                                    <select class="form-control" id="employee_permission" name="employee_permission" required></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="employee_status">Trạng thái</label>
                                    <select class="form-control" id="employee_status" name="employee_status" required>
                                        <option value="1">Đang làm</option>
                                        <option value="0">Đang nghỉ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_created_at">Ngày tạo</label>
                                    <input type="text" class="form-control" id="employee_created_at" name="employee_created_at" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_updated_at">Ngày cập nhật</label>
                                    <input type="text" class="form-control" id="employee_updated_at" name="employee_updated_at" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-employee-form">Lưu thông tin</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
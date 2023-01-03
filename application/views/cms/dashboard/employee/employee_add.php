<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm nhân viên</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/employee") ?>">
                    <button type="button" class="btn btn-outline-primary float-right">Danh sách nhân viên</button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form id="employee_data" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin nhân viên</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="employee_name">Tên nhân viên</label>
                                        <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="" required>
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
                                        <label for="employee_password">Mật khẩu</label>
                                        <input type="text" class="form-control" id="employee_password" name="employee_password" placeholder="" minlength="6" maxlength="150" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_confirm">Nhập lại mật khẩu</label>
                                        <input type="text" class="form-control" id="employee_confirm" name="employee_confirm" placeholder="" minlength="6" maxlength="150" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employee_address">Địa chỉ</label>
                                <input type="text" class="form-control" id="employee_address" name="employee_address" placeholder="" maxlength="250">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="employee_district">Quận huyện</label>
                                    <input type="text" class="form-control" id="employee_district" name="employee_district" placeholder="" maxlength="50">
                                </div>
                                <div class="col-sm-6">
                                    <label for="employee_city">Thành phố</label>
                                    <input type="text" class="form-control" id="employee_city" name="employee_city" placeholder="" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thiết lập chi nhánh</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employee_branch">Chi nhánh</label>
                                <select class="form-control" id="employee_branch" name="employee_branch" required></select>
                            </div>
                            <div class="form-group">
                                <label for="employee_permission">Vai trò</label>
                                <select class="form-control" id="employee_permission" name="employee_permission" required></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                <a href="<?= site_url("dashboard/employee") ?>">
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </a>
            </div>
        </form>
    </div>
</section>
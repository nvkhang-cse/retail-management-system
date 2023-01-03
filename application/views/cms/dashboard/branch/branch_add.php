<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm chi nhánh mới</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/branch") ?>">
                    <button type="button" class="btn btn-outline-primary float-right">Danh sách chi nhánh</button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form id="branch_data" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin chi nhánh</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="branch_name">Tên chi nhánh</label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="" required maxlength="50">
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
                                <label for="branch_central">Vai trò chi nhánh</label>
                                <select class="form-control" id="branch_central" name="branch_central" required>
                                    <option value="1">Chi nhánh trung tâm</option>
                                    <option value="2">Chi nhánh phụ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                <a href="<?= site_url("dashboard/branch") ?>">
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </a>
            </div>
        </form>
    </div>
</section>
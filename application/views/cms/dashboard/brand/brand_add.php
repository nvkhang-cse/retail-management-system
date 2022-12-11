<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm chi nhánh mới</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/brand") ?>">
                    <button type="button" class="btn btn-outline-primary float-right">Danh sách chi nhánh</button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form id="brand_data" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin chi nhánh</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="brand_name">Tên chi nhánh</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="brand_code">Mã chi nhánh</label>
                                        <input type="text" class="form-control" id="brand_code" name="brand_code" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand_address">Địa chỉ</label>
                                <input type="text" class="form-control" id="brand_address" name="brand_address" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="brand_city">Thành phố</label>
                                        <input type="text" class="form-control" id="brand_city" name="brand_city" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="brand_district">Quận huyện</label>
                                        <input type="text" class="form-control" id="brand_district" name="brand_district" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="brand_phone">Số điện thoại chi nhánh</label>
                                        <input type="text" class="form-control" id="brand_phone" name="brand_phone" placeholder="">
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
                                <label for="brand_central">Vai trò chi nhánh</label>
                                <select class="form-control" id="brand_central" name="brand_central">
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
                <a href="<?= site_url("dashboard/brand") ?>">
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </a>
            </div>
        </form>
    </div>
</section>
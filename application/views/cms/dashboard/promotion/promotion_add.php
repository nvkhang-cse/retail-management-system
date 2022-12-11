<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tạo khuyến mãi</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/promotion") ?>">
                    <button type="button" class="btn btn-outline-primary float-right">Danh sách khuyến mãi</button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form id="promotion_data" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin khuyến mãi</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="promotion_name">Tên khuyến mãi</label>
                                <input type="text" class="form-control" id="promotion_name" name="promotion_name" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_code">Mã khuyến mãi</label>
                                        <input type="text" class="form-control" id="promotion_code" name="promotion_code" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_type">Loại khuyến mãi</label>
                                        <select class="form-control" id="promotion_type" name="promotion_type">
                                            <option value="1">Hóa đơn</option>
                                            <option value="2">Giảm giá sản phẩm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_start_date">Ngày bắt đầu</label>
                                        <input type="text" class="form-control" id="promotion_start_date" name="promotion_start_date" placeholder="15-01-2022">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_end_date">Ngày kết thúc</label>
                                        <input type="text" class="form-control" id="promotion_end_date" name="promotion_end_date" placeholder="30-01-2022">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-lightblue" id="promotion_total_bill_wrapper">
                        <div class="card-header">
                            <h5 class="card-title">Thiết lập giá giảm (Hóa đơn)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_total_bill_from">Từ</label>
                                        <input type="number" class="form-control" id="promotion_total_bill_from" name="promotion_total_bill_from" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_total_bill_to">Đến</label>
                                        <input type="number" class="form-control" id="promotion_total_bill_to" name="promotion_total_bill_to" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_discount_type">Hình thức</label>
                                        <select class="form-control" id="promotion_discount_type" name="promotion_discount_type">
                                            <option value="1">Giảm trực tiếp</option>
                                            <option value="2">Chiết khấu (%)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_discount_value">Giá trị</label>
                                        <input type="number" class="form-control" id="promotion_discount_value" name="promotion_discount_value" placeholder="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card card-lightblue d-none" id="promotion_product_wrapper">
                        <div class="card-header">
                            <h5 class="card-title">Giảm giá sản phẩm</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_product_code">Mã sản phẩm</label>
                                        <input type="text" class="form-control" id="promotion_product_code" name="promotion_product_code" placeholder="Tìm kiếm sản phẩm">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="promotion_product_discount">Giảm giá (%)</label>
                                        <input type="number" class="form-control" id="promotion_product_discount" name="promotion_product_discount" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Áp dụng</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="promotion_brand">Chọn chi nhánh áp dụng</label>
                                <select class="form-control" id="promotion_brand" name="promotion_brand">
                                    <option value="ALL">Tất cả chi nhánh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                <a href="<?= site_url("dashboard/promotion") ?>">
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </a>
            </div>
        </form>
    </div>
</section>
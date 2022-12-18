<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tạo phiếu chi</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/cashbook") ?>">
                    <button type="button" class="btn btn-outline-primary float-right">Danh sách phiếu thu chi</button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form id="receipt_data" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin phiếu chi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="receipt_code">Mã phiếu</label>
                                        <input type="text" class="form-control" id="receipt_code" name="receipt_code" placeholder="" required maxlength="20">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="receipt_customer_code">Người nhận</label>
                                        <input type="text" class="form-control" id="receipt_customer_code" name="receipt_customer_code" placeholder="" required maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="receipt_value">Giá trị ghi nhận</label>
                                        <input type="number" class="form-control" id="receipt_value" name="receipt_value" placeholder="" required min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h5 class="card-title">Chi nhánh ghi nhận</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="receipt_brand">Chọn chi nhánh</label>
                                <select class="form-control" id="receipt_brand" name="receipt_brand" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                <a href="<?= site_url("dashboard/cashbook") ?>">
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </a>
            </div>
        </form>
    </div>
</section>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách khuyến mãi</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/promotion/loadpromotionadd") ?>">
                    <button type="button" class="btn btn-primary float-right">+ Tạo khuyến mãi</button>
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
                        <h5 class="card-title text-primary">Thông tin các chương trình khuyến mãi</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="promotion_wrapper">
                        <table cellspacing="5" cellpadding="5" class="mb-4">
                            <tbody>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Phương thức giảm:</td>
                                        <td>
                                            <select class="form-control" id="promotion-filter-bill-type" aria-label="Default select example">
                                                <option value="0" selected>Chọn phương thức giảm</option>
                                                <option value="1">Giảm trực tiếp</option>
                                                <option value="2">Chiết khấu</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td style="padding: 0;">Ngày hiệu lực:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày kiểm tra" id="promotion-filter-date"></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td style="padding: 0;">Hóa đơn hiệu lực:</td>
                                        <td><input type="text" class="form-control" placeholder="Giá trị hóa đơn" id="promotion-filter-bill-value"></td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>

                        <table id="promotion_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Loại khuyến mãi</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Hóa đơn từ</th>
                                    <th>Hóa đơn đến</th>
                                    <th>Phương thức giảm</th>
                                    <th>Giá giảm</th>
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

    <div class="modal fade" id="editPromotionInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="editPromotionForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin khuyến mãi</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="promotion_name">Tên khuyến mãi</label>
                            <input type="text" class="form-control" id="promotion_name" name="promotion_name" placeholder="" required maxlength="250">
                            <input type="text" class="form-control" name="promotion_code" id="promotion_code" value="" hidden>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_type">Loại khuyến mãi</label>
                                    <select class="form-control" id="promotion_type" name="promotion_type" required>
                                        <option value="1">Hóa đơn</option>
                                        <!-- <option value="2">Giảm giá sản phẩm</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_branch">Chi nhánh áp dụng</label>
                                    <select class="form-control" id="promotion_branch" name="promotion_branch" required>
                                        <option value="ALL">Tất cả chi nhánh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="promotion_start_date">Ngày bắt đầu</label>
                                    <input type="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control" id="promotion_start_date" name="promotion_start_date" placeholder="15-01-2022" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="promotion_end_date">Ngày kết thúc</label>
                                    <input type="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control" id="promotion_end_date" name="promotion_end_date" placeholder="30-01-2022" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_total_bill_from">Hóa đơn từ</label>
                                    <input type="number" class="form-control" id="promotion_total_bill_from" name="promotion_total_bill_from" placeholder="" min="0">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_total_bill_to">Hóa đơn đến</label>
                                    <input type="number" class="form-control" id="promotion_total_bill_to" name="promotion_total_bill_to" placeholder="" min="0">
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
                                    <input type="number" class="form-control" id="promotion_discount_value" name="promotion_discount_value" placeholder="" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_created_at">Ngày tạo</label>
                                    <input type="text" class="form-control" id="promotion_created_at" name="promotion_created_at" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_updated_at">Ngày cập nhật</label>
                                    <input type="text" class="form-control" id="promotion_updated_at" name="promotion_updated_at" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="promotion_created_by">Người tạo</label>
                                    <input type="text" class="form-control" id="promotion_created_by" name="promotion_created_by" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-promotion-form">Lưu thông tin</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Tổng hợp sổ quỹ</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/cashbook/loadreceiptoutcome") ?>">
                    <button type="button" class="btn btn-primary float-sm-right ml-2">+ Tạo phiếu chi</button>
                </a>
                <a href="<?= site_url("dashboard/cashbook/loadreceiptincome") ?>">
                    <button type="button" class="btn btn-primary float-sm-right">+ Tạo phiếu thu</button>
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
                        <h5 class="card-title text-primary">Danh sách phiếu thu chi</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="cashbook_wrapper">
                        <table cellspacing="5" cellpadding="5" class="mb-4">
                            <tbody>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Lọc loại phiếu:</td>
                                        <td>
                                            <select class="form-control" id="receipt-filter-type">
                                                <option value="0" selected>Chọn loại phiếu</option>
                                                <option value="1">Phiếu thu</option>
                                                <option value="2">Phiếu chi</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Từ ngày:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày bắt đầu" id="receipt-filter-start-date"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td>đến ngày:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày kết thúc" id="receipt-filter-end-date"></td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <table id="cashbook_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Mã phiếu</th>
                                    <th>Đối tượng</th>
                                    <th>Loại phiếu</th>
                                    <th>Người tạo</th>
                                    <th>Số tiền</th>
                                    <th>Ngày ghi nhận</th>
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

    <div class="modal fade" id="editCashBookInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="editCashBookForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin phiếu</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_type">Loại phiếu</label>
                                    <select class="form-control" id="receipt_type" name="receipt_type">
                                        <option value="1">Phiếu thu</option>
                                        <option value="2">Phiếu chi</option>
                                    </select>
                                    <input type="text" class="form-control" name="receipt_code" id="receipt_code" value="" hidden>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_branch">Chi nhánh</label>
                                    <select class="form-control" id="receipt_branch" name="receipt_branch">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_customer_code">Người nộp</label>
                                    <input type="text" class="form-control" id="receipt_customer_code" name="receipt_customer_code" placeholder="" required maxlength="30">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_value">Giá trị ghi nhận</label>
                                    <input type="number" class="form-control" id="receipt_value" name="receipt_value" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_created_by">Người tạo</label>
                                    <input type="text" class="form-control" id="receipt_created_by" name="receipt_created_by" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="receipt_created_at">Ngày tạo</label>
                                    <input type="text" class="form-control" id="receipt_created_at" name="receipt_created_at" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-form">Lưu thông tin</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách đơn hàng</h1>
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
                        <h5 class="card-title text-primary">Thông tin đơn hàng</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="order_wrapper">
                        <table cellspacing="5" cellpadding="5" class="mb-4">
                            <tbody>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Lọc trạng thái đơn:</td>
                                        <td>
                                            <select class="form-control" id="order-filter-status">
                                                <option value="0" selected>Chọn trạng thái đơn</option>
                                                <option value="1">Đã thanh toán</option>
                                                <option value="2">Đang giao</option>
                                                <option value="3">Đã hủy</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Từ ngày:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày bắt đầu" id="order-filter-start-date"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td>đến ngày:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày kết thúc" id="order-filter-end-date"></td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <table id="order_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày tạo đơn</th>
                                    <th>Tên khách hàng</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Giá trị đơn hàng</th>
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

    <div class="modal fade" id="viewOrderDetail" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="viewOrderForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin đơn hàng</h5>
                        <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="order_code">Mã đơn hàng</label>
                                    <input type="text" class="form-control bg-white" id="order_code" name="order_code" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="order_customer">Khách hàng</label>
                                    <input type="text" class="form-control bg-white" id="order_customer" name="order_customer" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_total_price">Tổng hóa đơn</label>
                                    <input type="text" class="form-control bg-white" id="order_total_price" name="order_total_price" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_discount">Chiết khấu nhóm</label>
                                    <input type="text" class="form-control bg-white" id="order_discount" name="order_discount" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_discount_bill">Giảm giá khuyến mãi</label>
                                    <input type="text" class="form-control bg-white" id="order_discount_bill" name="order_discount_bill" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_payment">Tiền khách phải trả</label>
                                    <input type="text" class="form-control bg-white" id="order_payment" name="order_payment" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_customer_money">Tiền khách đưa</label>
                                    <input type="text" class="form-control bg-white" id="order_customer_money" name="order_customer_money" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="order_customer_change">Tiền thối</label>
                                    <input type="text" class="form-control bg-white" id="order_customer_change" name="order_customer_change" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="order_staff">Nhân viên ghi nhận</label>
                                    <input type="text" class="form-control bg-white" id="order_staff" name="order_staff" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="order_created_at">Ngày ghi nhận</label>
                                    <input type="text" class="form-control bg-white" id="order_created_at" name="order_created_at" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <table id="order-detail-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Giá tổng số lượng</th>
                                        <th>Chiết khấu</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary close-modal" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>
<!-- /.content -->
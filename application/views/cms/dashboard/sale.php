<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <select id="branch_code" class="custom-select border border-primary">
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group align-items-center" data-widget="">
                            <i class="fas fa-search"></i>
                            <input type="text" id="gsearchsimple" class="form-control border-top-0 border-right-0 border-left-0" placeholder="Tìm kiếm sản phẩm">
                        </div>
                        <div class="dropdown">
                            <ul id="product-search-result" class="list-group dropdown-menu"></ul>
                        </div>
                        <div id="localSearchSimple"></div>
                    </div>
                    <div class="card-body" id="product-wrapper">
                        <button type="button" class="btn btn-primary btn-sm" id="delete_btn" onclick="deleteAllItem()">Xóa tất cả sản phẩm</button>
                        <div id="cart-detail" class="mt-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group align-items-center" data-widget="">
                            <i class="fas fa-search"></i>
                            <input type="text" id="customersearch" class="form-control border-top-0 border-right-0 border-left-0" placeholder="Nhập số điện thoại">
                            <button class="btn btn-outline-primary" id="add_customer"><b class="text-lg">+</b></button>
                        </div>
                        <div class="dropdown">
                            <ul id="customer-search-result" class="list-group dropdown-menu"></ul>
                        </div>
                        <div id="localSearchCustomer"></div>
                    </div>
                    <div class="card-body">
                        <div>Tên khách hàng:
                            <span class="float-right" id="customer_code" data-value="0">Khách lẻ</span>
                        </div>
                        <div>Điện thoại:
                            <span class="float-right" id="customer_phone"></span>
                        </div>
                        <div>Địa chỉ:
                            <span class="float-right" id="customer_address"></span>
                        </div>
                        <div>Nhóm:
                            <span class="float-right" id="customer_group"></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Thanh toán</h5>
                    </div>
                    <div class="card-body" id="">
                        <div class="">Tổng giá trị đơn hàng:
                            <span class="float-right" id="order-price" data-value="0">0</span>
                        </div>
                        <div class="">Chiết khấu nhóm:
                            <span class="float-right" data-value="0" id="customer-discount">0%</span>
                        </div>
                        <div class="">Giảm giá hóa đơn:
                            <span class="float-right" data-value="0" id="customer-bill-discount">0%</span>
                        </div>
                        <div class="mt-2">Mã khuyến mãi:
                            <select class="float-right" id="select-promotion" style="border-radius: 4px;">
                                <option value="0">Chọn khuyến mãi</option>
                            </select>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="">Khách phải trả:
                            <span class="float-right" data-value="0" id="customer-payment">0</span>
                        </div>
                        <div class="">Khách đưa:
                            <input type="number" min="0" class="float-right" style="border-radius: 4px;" id="customer-money" placeholder="Nhập tiền khách đưa">
                        </div>
                        <div class="" style="clear:both">Tiền thừa:
                            <span class="float-right" data-value="0" id="change-money">0</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="p-2">
                        <button class="btn btn-lg btn-primary float-right" id="payacheck">Thanh toán</button>
                        <button class="btn btn-primary float-right mr-3" id="createorderonline">Tạo đơn giao</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCustomerInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="addCustomerForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_name_new">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="customer_name_new" name="customer_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_group_new">Nhóm khách hàng</label>
                                    <select class="form-control" id="customer_group_new" name="customer_group">
                                        <option value="0">Chưa phân nhóm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_email_new">Email</label>
                                    <input type="email" class="form-control" id="customer_email_new" name="customer_email" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_phone_new">Số điện thoại</label>
                                    <input type="text" class="form-control" id="customer_phone_new" name="customer_phone" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_address_new">Địa chỉ cụ thể</label>
                                    <input type="text" class="form-control" id="customer_address_new" name="customer_address" placeholder="Số nhà, phường xã">
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_district_new">Quận/Huyện</label>
                                    <input type="text" class="form-control" id="customer_district_new" name="customer_district" placeholder="Quận, huyện">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_city_new">Khu vực</label>
                                    <input type="text" class="form-control" id="customer_city_new" name="customer_city" placeholder="Khu vực, thành phố">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-add-customer-form">Lưu thông tin</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
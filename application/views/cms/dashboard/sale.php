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
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="card-body" id="">
                        <div class="">Khách phải trả:
                            <span class="float-right" data-value="0" id="customer-payment">0</span>
                        </div>
                        <div class="">Khách đưa:
                            <input type="number" min="0" class="float-right" id="customer-money" placeholder="Nhập tiền khách đưa">
                        </div>
                        <div class="" style="clear:both">Tiền thừa:
                            <span class="float-right" data-value="0" id="change-money">0</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="p-2">
                        <button class="btn btn-lg btn-primary float-right" id="payacheck">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
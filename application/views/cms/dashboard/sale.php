<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="btn-group">
                    <button class="btn btn-primary">Đơn 1</button>
                    <button class="btn btn-outline-primary"><i class="fas fa-times-circle"></i></button>
                    <button class="btn ml-2"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="col-sm-6">
                <span class="float-sm-right text-primary">Chi nhánh mặc định</span>
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
                        <div class="input-group align-items-center " data-widget="">
                            <i class="fas fa-search text-muted"></i>
                            <input type="text" id="gsearchsimple" class="form-control border-top-0 border-right-0 border-left-0" placeholder="Tìm kiếm sản phẩm">
                        </div>
                        <div class="dropdown">
                            <ul id="product-search-result" class="list-group dropdown-menu">
                            </ul>
                        </div>
                        <div id="localSearchSimple"></div>
                        <!-- <div id="detail" style="margin-top:16px;"></div> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="product-wrapper">

                        <button type="button" class="btn btn-primary btn-sm mb-2" id="delete_btn" onclick="deleteAllItem()">Xóa sản phẩm</button>

                        <div id="detail" style="margin-top:16px;"></div>

                        <!-- <table id="productListTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>STT</th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn vị</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
            </table> -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group align-items-center" data-widget="">
                            <i class="fas fa-search text-muted"></i>
                            <input type="text" id="customersearch" class="form-control border-top-0 border-right-0 border-left-0" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="dropdown">
                            <ul id="customer-search-result" class="list-group dropdown-menu">
                            </ul>
                        </div>
                        <div id="localSearchCustomer"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="">
                        <div>Tên khách hàng:
                            <span class="float-right" id="customer-id" data-value="0">Khách vãng lai</span>
                        </div>
                        <div>Điện thoại:
                            <span class="float-right" id="customer-phone"></span>
                        </div>
                        <div>Địa chỉ:
                            <span class="float-right"></span>
                        </div>
                        <div>Công nợ:
                            <span class="float-right" id="customer-debt">0</span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <span>Thanh toán</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="">
                        <div class="">Tổng gía trị đơn hàng:
                            <span class="float-right" id="order-price" data-value="0">0</span>
                        </div>
                        <div class="">Thuế:
                            <span class="float-right">0</span>
                        </div>
                        <div class="">Chiết khấu:
                            <span class="float-right" data-value="0" id="customer-discount">0%</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="card-body" id="">
                        <div class="">Khách phải trả:
                            <span class="float-right" data-value="0" id="customer-payment">0</span>
                        </div>
                        <div class="">Khách đưa:
                            <input type="text" class="float-right" value="0" id="customer-money" placeholder="Nhập tiền khách đưa">
                        </div>
                        <div class="" style="clear:both">Tiền thừa:
                            <span class="float-right" data-value="0" id="change-money">0</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="p-3">
                        <button class="btn btn-info">Chọn hình thức thanh toán</button>
                        <button class="btn btn-lg btn-primary float-right" id="payacheck">Thanh toán</button>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- <form>
        <input type="hidden" id="product_id"/>
        <input type="hidden" id="idx1"/>
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />
        <input type="hidden" id="idx1" />



      </form> -->


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
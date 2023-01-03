<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/product/loadproductcategory") ?>">
                    <button type="button" class="btn btn-outline-primary float-sm-right ml-2">Quản lý loại sản phẩm</button>
                </a>
                <a href="<?= site_url("dashboard/product/loadproductadd") ?>">
                    <button type="button" class="btn btn-primary float-sm-right">+ Thêm sản phẩm</button>
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
                        <h5 class="card-title text-primary">Thông tin sản phẩm trong kho</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="warehouse_wrapper">
                        <table id="warehouse_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại</th>
                                    <th>Thương hiệu</th>
                                    <th>Xuất sứ</th>
                                    <th>Barcode</th>
                                    <th>Dung tích</th>
                                    <th>Đơn vị</th>
                                    <th>Số lượng được bán</th>
                                    <th>Tồn kho</th>
                                    <th>Giá bán lẻ</th>
                                    <th>Giá nhập</th>
                                    <th>Hạn sử dụng</th>
                                    <th>Trạng thái</th>
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

    <!-- Modal -->
    <div class="modal fade" id="editProductInfo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="editProductForm" action="" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product-new-name" class="col-form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" name="product-new-name" id="product-new-name" value="">
                            <input type="text" class="form-control" name="product-code" id="product-code" value="" hidden>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Thương hiệu:</label>
                            <input type="text" class="form-control" name="product-new-brand" id="product-new-brand" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="product-new-goodscost" class="col-form-label">Giá nhập:</label>
                                <input class="form-control" name="product-new-goodscost" id="product-new-goodscost" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="product-new-retailprice" class="col-form-label">Giá bán:</label>
                                <input class="form-control" name="product-new-retailprice" id="product-new-retailprice">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label">Số lượng:</label>
                                <input type="text" class="form-control" name="product-new-qty" id="product-new-qty" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Dung tích:</label>
                                <input type="text" class="form-control" name="product-new-capacity" id="product-new-capacity" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Đơn vị:</label>
                                <input type="text" class="form-control" name="product-new-unit" id="product-new-unit" value="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Trạng thái:</label><br>
                            <input type="radio" name="product-new-status" id="product-published" value="1">
                            <label>Mở bán</label><br>

                            <input type="radio" name="product-new-status" id="product-unpublished" value="0">
                            <label>Khóa</label><br>

                            <!-- <input type="radio" class="form-control" id=""> -->

                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Thành phần:</label>
                            <input type="text" class="form-control" name="product-new-ingred" id="product-new-ingred" value="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Mô tả:</label>
                            <input type="text" class="form-control" name="product-new-description" id="product-new-description" value="">
                        </div>
                        <!-- <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-form" disabled hidden>Lưu thông tin</button>
                        <button class="btn btn-primary" id="open-edit-form">Chỉnh sửa thông tin</button> -->
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" value="Submit" class="btn btn-primary" id="submit-edit-form">Lưu thông tin</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- /.Modal -->
</section>
<!-- /.content -->
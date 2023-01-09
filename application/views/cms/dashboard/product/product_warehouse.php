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
                        <table cellspacing="5" cellpadding="5" class="mb-4">
                            <tbody>
                                <tr>
                                    <div class="form-outline">
                                        <td class="p-0">Danh mục sản phẩm:</td>
                                        <td>
                                            <select class="form-control" id="product-filter-category" aria-label="Default select example">
                                                <option value="0" selected>Chọn danh mục sản phẩm</option>
                                            </select>
                                        </td>
                                    </div>
                                    <div class="form-outline">
                                        <td class="">Số lượng bán:</td>
                                        <td>
                                            <select class="form-control" id="check-quantity-warehouse" aria-label="Default select example">
                                                <option value="1">Còn hàng</option>
                                                <option value="2">Hết hàng</option>
                                            </select>
                                        </td>
                                    </div>
                                    <div class="form-outline">
                                        <td class="">Trạng thái:</td>
                                        <td>
                                            <select class="form-control" id="check-status-warehouse" aria-label="Default select example">
                                                <option value="" selected>Chọn trạng thái</option>
                                                <option value="1">Được bán</option>
                                                <option value="0">Không được bán</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td style="padding: 0;">Hạn sử dụng:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày bắt đầu" id="product-filter-start-date"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td>đến:</td>
                                        <td><input type="text" class="form-control" placeholder="Nhập ngày kết thúc" id="product-filter-end-date"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td></td>
                                        <td></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-outline">
                                        <td style="padding: 0;">Giá bản lẻ:</td>
                                        <td><input type="text" inputmode="numeric" placeholder="Nhập giá tối thiểu" class="form-control" id="product-filter-start-price"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td>đến:</td>
                                        <td><input type="text" inputmode="numeric" placeholder="Nhập giá tối đa" class="form-control" id="product-filter-end-price"></td>
                                    </div>
                                    <div class="form-outline">
                                        <td></td>
                                        <td></td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
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
                        <div class="form-group">
                            <label for="product-name">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" required maxlength="250">
                            <input type="text" class="form-control" name="product-code" id="product-code" value="" hidden>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_barcode">Barcode</label>
                                    <input type="text" class="form-control" id="product_barcode" name="product_barcode" placeholder="Mã vạch sản phẩm" maxlength="30">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_brand">Thương hiệu</label>
                                    <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_origin">Xuất sứ</label>
                                    <input type="text" class="form-control" id="product_origin" name="product_origin" placeholder="" maxlength="30">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_quantity_warehouse">Số lượng trong kho</label>
                                    <input type="number" class="form-control" id="product_quantity_warehouse" name="product_quantity_warehouse" placeholder="Số lượng khởi tạo ban đầu" required min="0">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_quantity_sale">Số lượng được bán</label>
                                    <input type="number" class="form-control" id="product_quantity_sale" name="product_quantity_sale" placeholder="Số lượng cho phép bán" required min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_capacity">Dung tích</label>
                                    <input type="number" class="form-control" id="product_capacity" name="product_capacity" placeholder="" min="0">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_unit">Đơn vị</label>
                                    <select class="form-control" id="product_unit" name="product_unit">
                                        <option value="Không">Không</option>
                                        <option value="ml">ml</option>
                                        <option value="l">L</option>
                                        <option value="g">g</option>
                                        <option value="kg">Kg</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_expired_date">Ngày hết hạn</label>
                                    <input type="date" class="form-control" pattern="\d{4}-\d{2}-\d{2}" id="product_expired_date" name="product_expired_date" placeholder="2025-01-30">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_published">Trạng thái</label>
                                    <select class="form-control" id="product_published" name="product_published">
                                        <option value="0">Không được bán</option>
                                        <option value="1">Được bán</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_cost">Giá nhập</label>
                                    <input type="number" class="form-control" id="product_cost" name="product_cost" placeholder="" min="0">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_wholesale">Giá bán buôn</label>
                                    <input type="number" class="form-control" id="product_wholesale" name="product_wholesale" placeholder="" min="0">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_retail">Giá bán lẻ</label>
                                    <input type="number" class="form-control" id="product_retail" name="product_retail" placeholder="" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="5" placeholder="Mô tả về công dụng, thương hiệu, chi tiết,..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_ingred">Thành phần</label>
                            <textarea class="form-control" id="product_ingred" name="product_ingred" rows="5" placeholder=""></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_category">Loại sản phẩm</label>
                                    <select class="form-control" id="product_category" name="product_category">
                                        <option value="0">Chưa phân loại</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_warehouse">Chọn chi nhánh</label>
                                    <select class="form-control" id="product_warehouse" name="product_warehouse">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" id="product_file" name="product_file" class="d-none">
                            <label for="product_file" class="text-primary">+ Thêm ảnh</label><br>
                            <img src="<?php echo base_url(); ?>/assets/dist/img/product/default_photo.jpg" id="product_photo" class="img-rounded img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_created_at">Ngày tạo</label>
                                    <input type="text" class="form-control" id="product_created_at" name="product_created_at" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="product_updated_at">Ngày cập nhật</label>
                                    <input type="text" class="form-control" id="product_updated_at" name="product_updated_at" disabled>
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
    <!-- /.Modal -->
</section>
<!-- /.content -->
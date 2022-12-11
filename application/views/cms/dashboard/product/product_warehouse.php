<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý kho</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <select id="warehouse_code" class="custom-select border border-primary">
                    </select>
                </div>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="warehouse_wrapper">
                        <table id="warehouse_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng được bán</th>
                                    <th>Tồn kho</th>
                                    <th>Giá bán lẻ</th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán buôn</th>
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
</section>
<!-- /.content -->
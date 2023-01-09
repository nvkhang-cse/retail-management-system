<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Thùng rác sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/product/loadproductwarehouse") ?>">
                    <button type="button" class="btn btn-outline-primary float-sm-right ml-2">Danh sách sản phẩm</button>
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
                        <h5 class="card-title text-primary">Danh sách sản phẩm trong thùng rác</h5>
                        <div class="float-sm-right">
                            <select id="branch_code" class="custom-select border border-primary">
                            </select>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="trash_wrapper">
                        <table id="trash_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại</th>
                                    <th>Barcode</th>
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
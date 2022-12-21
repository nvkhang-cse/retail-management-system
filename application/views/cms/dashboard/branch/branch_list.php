<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách chi nhánh</h1>
            </div>
            <div class="col-sm-6">
                <a href="<?= site_url("dashboard/branch/loadbranchadd") ?>">
                    <button type="button" class="btn btn-primary float-right">+ Thêm chi nhánh</button>
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
                        <h5 class="card-title text-primary">Thông tin chi nhánh</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="branch_wrapper">
                        <table id="branch_list_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên chi nhánh</th>
                                    <th>Địa chỉ</th>
                                    <th>Quận huyện</th>
                                    <th>Thành phố</th>
                                    <th>Số điện thoại</th>
                                    <th>Vai trò</th>
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
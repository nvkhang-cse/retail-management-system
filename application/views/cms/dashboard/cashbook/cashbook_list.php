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
</section>
<!-- /.content -->
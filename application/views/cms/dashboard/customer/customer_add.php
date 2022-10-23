  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm khách hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url("dashboard/customer") ?>">Tất cả khách hàng</a></li>
            <li class="breadcrumb-item active">Thêm mới khách hàng</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Thông tin khách hàng</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="customer_name">Tên khách hàng*</label>
                  <input type="text" class="form-control" id="customer_name" placeholder="Nhập tên khách hàng">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_code">Mã khách hàng*</label>
                      <input type="text" class="form-control" id="customer_code" placeholder="Nhập mã khách hàng">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_group">Nhóm khách hàng*</label>
                      <input type="text" class="form-control" id="customer_group" placeholder="Chọn nhóm khách hàng">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_phone">Số điện thoại*</label>
                      <input type="text" class="form-control" id="customer_phone" placeholder="Thêm số điện thoại">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customer_email">Email*</label>
                      <input type="text" class="form-control" id="customer_email" placeholder="Email của khách hàng">
                    </div>
                  </div>
                  <!-- <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_quantity">Số lượng*</label>
                      <input type="text" class="form-control" id="product_quantity" placeholder="">
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div> -->
            </form>
          </div>


          <div class="card card-secondary">
            <div class="card-header">
              <h4 class="card-title">Thông tin địa chỉ</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_cities">Khu vực</label>
                    <input type="text" class="form-control" id="customer_cities" placeholder="Khu vực, thành phố">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_district">Quận/Huyện</label>
                    <input type="text" class="form-control" id="customer_district" placeholder="Quận, huyện">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_village">Phường/Xã</label>
                    <input type="text" class="form-control" id="customer_village" placeholder="Phường, xã">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="customer_address">Địa chỉ</label>
                    <input type="text" class="form-control" id="customer_address" placeholder="Số nhà">
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- <div class="card card-secondary">
            <div class="card-header">
              <h4 class="card-title">Chi tiết sản phẩm</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" id="product_description" rows="3" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="">Thành phần*</label>
                <textarea class="form-control" id="product_ingred" rows="3" placeholder="Enter ..."></textarea>
              </div>
            </div>
          </div> -->


          <!-- <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Input Addon</h3>
            </div>
            <div class="card-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <h4>With icons</h4>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-check"></i></span>
                </div>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                </div>
              </div>
              <h5 class="mt-4 mb-2">With checkbox and radio inputs</h5>
              <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                      <input type="checkbox">
                      </span>
                    </div>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><input type="radio"></span>
                    </div>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
              <h5 class="mt-4 mb-2">With buttons</h5>
              <p>Large: <code>.input-group.input-group-lg</code></p>
              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                  Action
                  </button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="#">Action</a></li>
                    <li class="dropdown-item"><a href="#">Another action</a></li>
                    <li class="dropdown-item"><a href="#">Something else here</a></li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <input type="text" class="form-control">
              </div>
              <p>Normal</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-danger">Action</button>
                </div>
                <input type="text" class="form-control">
              </div>
              <p>Small <code>.input-group.input-group-sm</code></p>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                <span class="input-group-append">
                <button type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
              </div>
            </div>
          </div>
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Horizontal Form</h3>
            </div>
            <form class="form-horizontal">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Sign in</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
            </form>
          </div> -->
        </div>
        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Cài đặt</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label>Chính sách giá</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Thuế</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>

                </div>
                <div class="form-group">
                  <label>Chiết khấu</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>

                </div>


              </form>
            </div>
          </div>



        </div>
      </div>
      <div>
        <button class="btn btn-primary btn-lg float-right">Lưu</button>
      </div>
    </div>
  </section>
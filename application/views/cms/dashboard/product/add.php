  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm mới sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <form id="product_data" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <!-- <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div> -->
            <div class="card-body">
              <div class="form-group">
                <label for="product_name">Tên sản phẩm*</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm">
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="product_code">Mã sản phẩm*</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Nhập mã sản phẩm">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="product_brand">Thương hiệu*</label>
                    <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder=""> 
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="product_ori">Xuất sứ*</label>
                    <input type="text" class="form-control" id="product_ori" name="product_ori" placeholder=""> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_barcode">Barcode*</label>
                    <input type="text" class="form-control" id="product_barcode" name="product_barcode" placeholder="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_quantity">Số lượng*</label>
                    <input type="text" class="form-control" id="product_quantity" name="product_quantity" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_capacity">Dung tích*</label>
                    <input type="text" class="form-control" id="product_capacity" name="product_capacity" placeholder="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="product_unit">Đơn vị*</label>
                    <input type="text" class="form-control" id="product_unit" name="product_unit" placeholder="">
                  </div>
                </div>
              </div>
              

              
            </div>
            <!-- <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
          </div>


          <div class="card card-secondary">
            <div class="card-header">
              <h4 class="card-title">Giá sản phẩm</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_cost">Giá nhập</label>
                      <input type="text" class="form-control" id="product_cost" name="product_cost" placeholder="Nhập mã sản phẩm">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_wholesale">Giá bán sỉ</label>
                      <input type="text" class="form-control" id="product_wholesale" name="product_wholesale" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_retail">Giá bán lẻ</label>
                      <input type="text" class="form-control" id="product_retail" name="product_retail" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Đơn vị</label>
                      <input type="text" class="form-control" id="" placeholder=""> -->
                    </div>
                  </div>
                </div>
            </div>
          </div>

          <div class="card card-secondary">
            <div class="card-header">
              <h4 class="card-title">Chi tiết sản phẩm</h4>
            </div>
            <div class="card-body">   
              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="5" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="">Thành phần*</label>
                <textarea class="form-control" id="product_ingred" name="product_ingred" rows="5" placeholder="Enter ..."></textarea>
              </div>
            </div>
          </div>
        </div>




        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Phân loại</h3>
            </div>
            <div class="card-body">    
              <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-control">
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nhãn hiệu</label>
                <select class="form-control">
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Kho</h3>
            </div>
            <div class="card-body">    
              <div class="form-group">
                <label>Chọn chi nhánh</label>
                <select class="form-control">
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Ảnh sản phẩm</h3>
            </div>
            <div class="card-body">    
              <!-- <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                <input type="file" class="form-control" id="inputGroupFile01">
              </div> -->
              <div class="form-group">
                <input type="file" id="product_file" name="product_file" style="display:none">
                <label for="product_file" id="uploadBtn"><i class="fa fa-plus"></i>&nbsp;Thêm ảnh</label>
                <img src="<?php echo base_url(); ?>/assets/dist/img/product/default_photo.jpg" id="product_photo" class="img-rounded img-fluid">
              </div>
              <!-- <div class="image">
                <img src="<?php echo base_url(); ?>/assets/dist/img/user2-160x160.jpg" class="img-square elevation-2" alt="User Image">
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-info mr-1">  Lưu  </button>
        <a href="<?= site_url("dashboard/product") ?>">
            <button type="button" class="btn bg-gradient-secondary">Hủy bỏ</button>
        </a>
      </div>

      <br>
      <br>

      </form>
    </div>
  </section>

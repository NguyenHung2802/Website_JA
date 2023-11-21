<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P&T Shop</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- link font chữ -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
  <!-- link icon -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./assets/css/base.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/account.css">
  <link rel="stylesheet" href="./assets/css/reponsive1.css">
  <link rel="icon" href="./assets/img/logo/main.png" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
</head>
<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
  .wrapper {
    margin-top:30px;
  }
</style>
<body>
  <div class="overlay hidden"></div>
  <!-- mobile menu -->
  <div class="mobile-main-menu">
    <div class="drawer-header">
      <a href="">
        <div class="drawer-header--auth">
          <div class="_object">
            <img src="./assets/img/product/giayxah2.jpg" alt="">
          </div>
          <div class="_body">Đăng nhập
            <br>Nhận nhiều ưu đãi hơn
          </div>
        </div>
      </a>
    </div>
    <ul class="ul-first-menu">
      <li>
        <a href="">Đăng nhập</a>
      </li>
      <li>
        <a href="" class="abc">Đăng kí</a>
      </li>
    </ul>
    <!-- <ul class="ul-first-menu">
      <li>
        <a href="">Tài khoản của tôi</a>
      </li>
      <li>
        <a href="">Địạ chỉ của tôi</a>
      </li>
      <li>
        <a href="">Đơn mua</a>
      </li>
      <li>
        <a href="" class="list-like-noicte">Danh sách yêu thích</a>
        <span id="header__second__like--notice" class="header__second__like--notice">3</span>
      </li>
      <li>
        <a href="">Đăng xuất</a>
      </li> -->
    </ul>
    <div class="la-scroll-fix-infor-user">
      <div class="la-nav-menu-items">
        <div class="la-title-nav-items">
          <strong>Danh mục</strong>
        </div>
        <ul class="la-nav-list-items">
          <li class="ng-scope">
            <a href="">Trang chủ</a>
          </li>
          <li class="ng-scope">
            <a href="./intro.html">Giới thiệu</a>
          </li>
          <li class="ng-scope ng-has-child1">
            <a href="./Product.html">Sản phẩm <i class="fas fa-plus cong"></i> <i class="fas fa-minus tru hidden"></i></a>
            <ul class="ul-has-child1">
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Tất cả sản phẩm <i class="fas fa-plus cong1" onclick="hienthi(1,`abc`)"></i> <i
                    class="fas fa-minus tru1 hidden" onclick="hienthi(1,`abc`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Quần áo <i class="fas fa-plus cong2" onclick="hienthi(2,`abc2`)"></i> <i
                    class="fas fa-minus tru2 hidden" onclick="hienthi(2,`abc2`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc2">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Già dép<i class="fas fa-plus cong3" onclick="hienthi(3,`abc3`)"></i> <i
                    class="fas fa-minus tru3 hidden" onclick="hienthi(3,`abc3`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc3">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Phụ kiện <i class="fas fa-plus cong4" onclick="hienthi(4,`abc4`)"></i> <i
                    class="fas fa-minus tru4 hidden " onclick="hienthi(4,`abc4`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc4">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="ng-scope">
            <a href="./news.html">Tin tức</a>
          </li>
          <li class="ng-scope">
            <a href="./contact.html">Liên hệ</a>
          </li>
        </ul>
      </div>
    </div>
    <ul class="mobile-support">
      <li>
        <div class="drawer-text-support">Hỗ trợ</div>
      </li>
      <li>
        <i class="fas fa-phone-square-alt footer__item-icon">HOTLINE: </i>
        <a href="tel:19006750">19006750</a>
      </li>
      <li>
        <i class="fas fa-envelope-square footer__item-icon">Email: </i>
        <a href="mailto:support@sapo.vn">support@gmail.vn</a>
      </li>
    </ul>
  </div>
  <!-- end mobile menu -->
  
  <!-- content -->
  <div class="container">
    <div class="wrapper">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="heading">
            <img src="./assets/img/product/noavatar.png" alt="" class="heading-img">
            <span class="heading-name_acc">Quốc Trung</span>
          </div>
          <div class="menu-manager">
            <div class="my-profile item-manager active">
              <div class="my-profile-title ">
                <div class="my-profile-icon"><i class="fas fa-user"></i></div>
                <div class="my-profile-name">Hồ sơ của tôi</div>
              </div>
            </div>
            <div class="my-password item-manager">
              <div class="my-password-title">
                <div class="my-password-icon"><i class="fas fa-key"></i></div>
                <div class="my-password-name">Đổi mật khẩu</div>
              </div>
            </div>
            <div class="my-order item-manager">
              <div class="my-order-title">
                <div class="my-order-icon"><i class="fas fa-shopping-bag"></i></div>
                <div class="my-order-name">Đơn hàng của tôi</div>
              </div>
            </div>
           
          </div>
        </div>
        <div class="col-lg-8 col-12">
          <div class="menu-detail">
            <div class="detial__my-profile item-detail active">
              <div class="heading-edit-account">
                <h2>Hồ sơ của tôi</h2>
                <div class="form-group">
                  <label for="fullname" class="form-label">Tên đầy đủ</label>
                  <input id="fullname" name="fullname" type="text" placeholder="VD: Quốc Trung" class="form-control"
                    value="Quốc Trung">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control"
                    value="abc@gmail.com">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Địa chỉ</label>
                  <input id="email" name="email" type="text" placeholder="VD: 86/2/3 Bình Thạnh TP HCM" class="form-control"
                    value="86 Đinh Bộ Lĩnh Phường 26 Quận Bình Thạnh TP.HCM">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="sdt" class="form-label">Số điện thoại</label>
                  <input id="sdt" name="sdt" type="number" placeholder="VD: 089" class="form-control" value="0912420530">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="avatar" class="form-label">Cập nhật avatar</label>
                  <input id="avatar" name="avatar" type="file" class="form-control">
                  <span class="form-message"></span>
                </div>
                <button class="form-submit">Lưu</button>
              </div>
            </div>
            <div class="detail__confirm-password item-detail">
              <div class="heading-edit-password">
                <h2>Đổi lại mật khẩu</h2>
              </div>
              <div class="form-group form-group-old-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password" class="form-label">Mật khẩu cũ</label>
                  <span class="show-hide"><i class="fas fa-eye"></i></span>
                </div>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
              </div>
              <div class="form-group form-group-new-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password-new" class="form-label">Mật khẩu mới</label>
                  <span class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
                </div>
                <input id="password-new" name="password-new" type="password" placeholder="Nhập mật khẩu"
                  class="form-control">
                <span class="form-message"></span>
              </div>
              <div class="form-group form-group-confirm-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password-confirm" class="form-label">Mật khẩu mới</label>
                  <span class="show-hide-three"><i class="fas fa-eye fa-eye-3"></i></span>
                </div>
                <input id="password-confirm" name="password-confirm" type="password" placeholder="Nhập mật khẩu"
                  class="form-control">
                <span class="form-message"></span>
              </div>
              <button class="form-submit">Lưu</button>
            </div>
            <div class="detail__my-order item-detail">
              <div class="heading-edit-password">
                <h2>Đơn hàng của bạn</h2>
              </div>
              <div class="detail__my-order-content">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>MĐH</th>
                      <th>Ngày</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Chi tiết</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#1</td>
                      <td>05-06-2021</td>
                      <td>3.000.000 VNĐ</td>
                      <td>
                        <span class="btn-stt blue">Đang xác nhận</span>
                      </td>
                      <td><a href="" data-toggle="modal" data-target="#myModal">Xem</a></td>
                    </tr>
                    <tr>
                      <td>#2</td>
                      <td>05-06-2021</td>
                      <td>3.000.000 VNĐ</td>
                      <td>
                        <span class="btn-stt green">Đã giao</span>
                      </td>
                      <td><a href="" data-toggle="modal" data-target="#myModal">Xem</a></td>
                    </tr>
                    <tr>
                      <td>#3</td>
                      <td>05-06-2021</td>
                      <td>3.000.000 VNĐ</td>
                      <td>
                        <span class="btn-stt red">Đã hủy</span>
                      </td>
                      <td><a href="" data-toggle="modal" data-target="#myModal">Xem</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Chi tiết đơn hàng</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="margin-top:10px">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Màu</th>
                <th>Kích cỡ</th>
                <th>Gía bán</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="./assets/img/product/addidas1.jpg" alt="" width="50px">
                </td>
                <td>ADIDAS</td>
                <td>đỏ</td>
                <td>
                  L
                </td>
                <td>1.000.000đ</td>
                <td>2</td>
                <td>2.000.000đ</td>
              </tr>
              <tr>
                <td>
                  <img src="./assets/img/product/addidas1.jpg" alt="" width="50px">
                </td>
                <td>ADIDAS</td>
                <td>đỏ</td>
                <td>
                  L
                </td>
                <td>1.000.000đ</td>
                <td>2</td>
                <td>2.000.000đ</td>
              </tr>
              <tr>
                <td>
                  <img src="./assets/img/product/addidas1.jpg" alt="" width="50px">
                </td>
                <td>ADIDAS</td>
                <td>đỏ</td>
                <td>
                  L
                </td>
                <td>1.000.000đ</td>
                <td>2</td>
                <td>2.000.000đ</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</body>
<script src="./assets/js/main.js"></script>
<script>
  const pass_field = document.querySelector('#password');
  const show_btn = document.querySelector('.fa-eye')
  show_btn.addEventListener("click", function () {
    if (pass_field.type === "password") {
      pass_field.type = "text";
      show_btn.classList.add("hide");
    } else {
      pass_field.type = "password";
      show_btn.classList.remove("hide");
    }
  });
</script>
<script>
  const pass_field2 = document.querySelector('#password-new');
  const show_btn2 = document.querySelector('.fa-eye-2')
  show_btn2.addEventListener("click", function () {
    if (pass_field2.type === "password") {
      pass_field2.type = "text";
      show_btn2.classList.add("hide");
    } else {
      pass_field2.type = "password";
      show_btn2.classList.remove("hide");
    }
  });
</script>
<script>
  const pass_field3 = document.querySelector('#password-confirm');
  const show_btn3 = document.querySelector('.fa-eye-3')
  show_btn3.addEventListener("click", function () {
    if (pass_field3.type === "password") {
      pass_field3.type = "text";
      show_btn3.classList.add("hide");
    } else {
      pass_field3.type = "password";
      show_btn3.classList.remove("hide");
    }
  });
</script>
<!-- <script>
  function hienThiDoiMatKhau() {
    $(".detail__confirm-password").removeClass("undisplay");
    $(".detail__confirm-password").addClass("display");
    $(".my-password-title").addClass("active");
    $(".my-profile-title").removeClass("active");
    $(".detial__my-profile").addClass("undisplay");
    $(".detial__my-profile").removeClass("display");
  }
  function hienThiDoiThongTin() {
    $(".detial__my-profile").removeClass("undisplay");
    $(".detial__my-profile").addClass("display");
    $(".my-profile-title").addClass("active");
    $(".my-password-title").removeClass("active");
    $(".detail__confirm-password").addClass("undisplay");
    $(".detail__confirm-password").removeClass("display");
  }
</script> -->

</html>
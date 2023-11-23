    <div class="container">
      <div class="login__form">
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <form action="" method="POST" class="form" id="form-2">
              <h3 class="heading">ĐĂNG NHẬP</h3>
              <!-- <a href="" class="form__forgot-password">Bạn quên mật khẩu?</a> -->
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
              </div>

              <div class="form-group matkhau">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="show-hide"><i class="fas fa-eye" onclick="myFunction()"></i></span>
                <!-- <i class="fi-rs-eye-crossed undisplay" onclick="showhide()"></i> -->
                <span class="form-message"></span>
              </div>
              <button class="form-submit btn-blocker" style="border-radius: unset;">ĐĂNG NHẬP <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button>
            </form>
          </div>
          <div class="col-sm-12 col-lg-6">
            <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
            <p class="text-login">Thật dễ dàng tạo một tài khoản. Hãy nhập địa chỉ email của bạn và điền vào mẫu trên
              trang tiếp theo và tận hưởng những lợi ích của việc sở hữu một tài khoản :</p>
            <ul>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Tổng quan đơn giản về thông tin cá nhân của bạn</p>
              </li>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Thanh toán nhanh hơn</p>
              </li>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Ưu đãi và khuyến mãi độc quyền</p>
              </li>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Các sản phẩm mới nhất</p>
              </li>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Các bộ sưu tập giới hạn và bộ sưu tập theo mùa mới</p>
              </li>
              <li class="text-login-item"><i class="fas fa-check"></i>
                <p class="text-login">Các sự kiện sắp tới</p>
              </li>
            </ul>
            <a href="index.php?quanly=dangKy"><button class="form-submit btn-blocker custom-btn" style="border-radius: unset;margin:unset">ĐĂNG KÍ <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button></a>
          </div>
        </div>
      </div>
    </div>
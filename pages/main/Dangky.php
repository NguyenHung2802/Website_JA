<div class="container">
  <div class="registration__form">
    <div class="row">
      <div class="col-sm-12 col-lg-6">
        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">ĐĂNG KÍ</h3>
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Tuấn Thành" class="form-control">
            <span class="form-message"></span>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message"></span>
          </div>
          <div class="form-group matkhau">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="show-hide"><i class="fas fa-eye"></i></span>
            <span class="form-message"></span>
          </div>

          <div class="form-group matkhau">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
            <span class="form-message"></span>
          </div>

          <button class="form-submit btn-blocker" style="border-radius: unset;">Đăng ký <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button>
          <p style="font-size: 16px;margin: 10px 0;">Bạn đã có tài khoản? <a href="index.php?quanly=dangNhap" style="color: black; font-weight: bold">Đăng nhập</a></p>
        </form>
      </div>
      <div class="col-sm-12 col-lg-6">
        <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
        <p class="text-login">Đăng nhập bằng tài khoản sẽ giúp bạn truy cập:</p>
        <ul>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Một lần đăng nhập chung duy nhất để tương tác với các sản phẩm và dịch vụ của P&T
              shop
            </p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Thanh toán nhanh hơn</p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Xem lịch sử đặt hàng riêng của bạn</p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Thêm hoặc thay đổi tùy chọn email</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
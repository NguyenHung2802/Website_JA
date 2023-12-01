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
</style>

<?php
$id_user = $_SESSION['id_user'];
$sql_get_user = "SELECT * FROM users WHERE idUser = $id_user";
$query_get_user = mysqli_query($connect, $sql_get_user);
$row_user = mysqli_fetch_array($query_get_user)
?>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-12">
      <div class="heading">
        <img src="https://t4.ftcdn.net/jpg/04/08/24/43/360_F_408244382_Ex6k7k8XYzTbiXLNJgIL8gssebpLLBZQ.jpg" alt="" class="heading-img">
        <span class="heading-name_acc"><?php echo $row_user['fullName'] ?></span>
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
      <div class="menu-detail mt-5">
        <div class="detial__my-profile item-detail active">
          <div class="heading-edit-account">
            <h2>Hồ sơ của tôi</h2>
            <div class="form-group">
              <label for="fullname" class="form-label">Tên đầy đủ</label>
              <input id="fullname" name="fullname" type="text" placeholder="VD: Tuấn Thành" class="form-control" value="<?php echo $row_user['fullName'] ?>">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" readonly name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="<?php echo $row_user['email'] ?>">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="address" class="form-label">Địa chỉ</label>
              <input id="address" name="address" type="text" placeholder="VD: Nguyên Xá, Bắc Từ Liêm,Hà Nội" class="form-control" value="<?php echo $row_user['address'] ?>">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="sdt" class="form-label">Số điện thoại</label>
              <input id="sdt" name="sdt" type="number" placeholder="VD: 123" class="form-control" value="<?php echo $row_user['phone'] ?>">
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
            <input id="password-new" name="password-new" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
          <div class="form-group form-group-confirm-password">
            <div style="display:flex;justify-content: space-between;">
              <label for="password-confirm" class="form-label">Mật khẩu mới</label>
              <span class="show-hide-three"><i class="fas fa-eye fa-eye-3"></i></span>
            </div>
            <input id="password-confirm" name="password-confirm" type="password" placeholder="Nhập mật khẩu" class="form-control">
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
<script src="./assets/js/main.js"></script>
<script>
  const pass_field = document.querySelector('#password');
  const show_btn = document.querySelector('.fa-eye')
  show_btn.addEventListener("click", function() {
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
  show_btn2.addEventListener("click", function() {
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
  show_btn3.addEventListener("click", function() {
    if (pass_field3.type === "password") {
      pass_field3.type = "text";
      show_btn3.classList.add("hide");
    } else {
      pass_field3.type = "password";
      show_btn3.classList.remove("hide");
    }
  });
</script>
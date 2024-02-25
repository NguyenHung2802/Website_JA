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
$row_user = mysqli_fetch_array($query_get_user);

if (isset($_POST['submitInfo'])) {
  $fullName = $_POST['fullname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $sql_update_user = "UPDATE users SET fullName = '$fullName', address = '$address', phone = '$phone' Where idUser = $id_user";
  $query_update_user = mysqli_query($connect, $sql_update_user);
  echo
  "<script>
    alert('Cập nhật hồ sơ thành công!')
    location.href = 'index.php?quanly=thongtin'
  </script>";
}

if (isset($_POST['sbChangePw'])) {
  $password = $_POST['password'];
  $passwordNew = $_POST['password-new'];
  $passwordConfirm = $_POST['password-confirm'];

  $sql_get_pw = "SELECT password from users where idUser = $id_user";
  $query_get_pw = mysqli_query($connect, $sql_get_pw);
  $row_pw = mysqli_fetch_array($query_get_pw)['password'];

  if ($passwordNew != $passwordConfirm) {
    echo "<script>
    alert('Mật khẩu nhập lại không đúng');
    </script>";
  } else if (md5($password) != $row_pw) {
    echo "<script>
    alert('Mật khẩu cũ không đúng');
    </script>";
  } else {
    $newpass = md5($passwordConfirm);
    $sql_update_pass = "UPDATE users SET password = '$newpass' Where idUser = $id_user";
    $query_update_pass = mysqli_query($connect, $sql_update_pass);
    echo "<script>
    alert('Thay đổi mật khẩu thành công');
    </script>";
  }
}
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
        <div class="my-contact item-manager" style="padding-top: 8px;">
          <div class="my-contact-title" style="display: flex;">
            <div class="my-contact-icon" style="padding-right: 8px;"><i class="fa-solid fa-phone-volume"></i></i></div>
            <div class="my-contact-name">Liên hệ của tôi</div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-8 col-12">
      <div class="menu-detail mt-5">
        <div class="detial__my-profile item-detail active">
          <div class="heading-edit-account">
            <h2>Hồ sơ của tôi</h2>
            <form action="" method="POST">
              <div class="form-group">
                <label for="fullname" class="form-label">Tên đầy đủ</label>
                <input required id="fullname" name="fullname" type="text" placeholder="VD: Tuấn Thành" class="form-control" value="<?php echo $row_user['fullName'] ?>">
                <span class="form-message"></span>
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input required id="email" readonly name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="<?php echo $row_user['email'] ?>">
                <span class="form-message"></span>
              </div>
              <div class="form-group">
                <label for="address" class="form-label">Địa chỉ</label>
                <input required id="address" name="address" type="text" placeholder="VD: Nguyên Xá, Bắc Từ Liêm,Hà Nội" class="form-control" value="<?php echo $row_user['address'] ?>">
                <span class="form-message"></span>
              </div>
              <div class="form-group">
                <label for="sdt" class="form-label">Số điện thoại</label>
                <input id="sdt" name="phone" type="number" placeholder="VD: 123" class="form-control" value="<?php echo $row_user['phone'] ?>">
                <span class="form-message"></span>
              </div>
              <button type="submit" name="submitInfo" class="form-submit">Lưu</button>
          </div>
          </form>
        </div>
        <div class="detail__confirm-password item-detail">
          <div class="heading-edit-password">
            <h2>Đổi lại mật khẩu</h2>
          </div>
          <form action="" method="POST">
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
                <label for="password-confirm" class="form-label">Nhập lại mật khẩu mới</label>
                <span class="show-hide-three" style="position: relative; top: 60px; left: -3px;"><i class="fas fa-eye fa-eye-3"></i></span>
              </div>
              <input id="password-confirm" name="password-confirm" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="form-message"></span>
            </div>
            <button type="submit" name="sbChangePw" class="form-submit">Lưu</button>
        </div>
        </form>
        <div class="detail__my-order item-detail">
          <div class="heading-edit-password mb-4">
            <h2>Đơn hàng của bạn</h2>
          </div>
          <div class="detail__my-order-content">
            <table class="table table-hover">
              <?php
              $sql_get_cart_order = "SELECT * from cart where idUser = $id_user  and statusCart != 0";
              $query_get_cart_order = mysqli_query($connect, $sql_get_cart_order);
              ?>
              <thead>
                <tr>
                  <th>Ngày</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Chi tiết</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row_get_cart_order = mysqli_fetch_array($query_get_cart_order)) {
                  $idCart = $row_get_cart_order['idCart'];
                  $sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct where idCart = $idCart";
                  $query_total_cart = mysqli_query($connect, $sql_total_cart);
                  $total_cart = mysqli_fetch_array($query_total_cart);
                ?>
                  <tr>
                    <td><?php echo $row_get_cart_order['createdAt'] ?></td>
                    <td><?php echo number_format($total_cart['total']) ?> VNĐ</td>

                    <?php
                    $status = $row_get_cart_order['statusCart'];
                    $statusText = '';

                    switch ($status) {
                      case 1:
                        $statusText = 'Đang chờ';
                        break;
                      case 2:
                        $statusText = 'Đã hủy';
                        break;
                      case 3:
                        $statusText = 'Đang giao hàng';
                        break;
                      case 4:
                        $statusText = 'Giao thành công';
                        break;
                      case 5:
                        $statusText = 'Giao thất bại';
                        break;
                    }
                    ?>
                    <td>
                      <span class="btn-stt" style="color: black;"><?php echo $statusText; ?></span>
                    </td>

                    <td><a href="index.php?quanly=orderDetail&idCart=<?php echo $idCart ?>">Xem</a></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="detail__my-order item-detail">
          <div class="heading-edit-password mb-4">
            <h2>Liên hệ của tôi</h2>
          </div>
          <div class="detail__my-order-content">
            <table class="table table-hover">
              <?php
              $sql = "SELECT * from contacts where idUser = $id_user";
              $query = mysqli_query($connect, $sql);
              ?>
              <thead>
                <tr>
                  <th>Ngày gửi</th>
                  <th>Tiêu đề</th>
                  <th>Nội dung</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row_contact = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?php echo $row_contact['createdAt'] ?></td>
                    <td><?php echo $row_contact['topic'] ?></td>
                    <td><?php echo $row_contact['content'] ?></td>
                  </tr>
                <?php
                }
                ?>
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
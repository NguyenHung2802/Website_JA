<style>
    .title-heading {
        margin: 0;
        color: #36424b;
        font-size: 18px;
        font-weight: 500;
        padding: 0;
        margin-top: 0;
        margin-bottom: 10px;
        position: relative;
        text-transform: uppercase;
    }

    .contact-info {
        padding: 0;
    }

    .contact-info li {
        display: table;
        margin-bottom: 7px;
        font-size: 14px;
    }

    .text-contact {
        font-style: italic;
        color: #707e89;
        font-size: 12px;
    }

    .mapbox {
        border-top: 1px solid #e8e9f1;
        margin-top: 30px;
        height: 350px;
        overflow: hidden;
        border: 10px solid #e5e5e5;
        border-radius: 3px;
    }

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

    /* Mobile & tablet  */
    @media (max-width: 1023px) {}

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {

        textarea {
            width: 100%;
        }

    }

    /* mobile */
    @media (max-width: 739px) {}
</style>

<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $sql_get_user = "SELECT * FROM users WHERE idUser = $id_user";
    $query_get_user = mysqli_query($connect, $sql_get_user);
    $row_user = mysqli_fetch_array($query_get_user);

    if (isset($_POST['sbContact'])) {
        $title = $_POST['title'];
        $noidung = $_POST['noidung'];
        $id_user = $_SESSION['id_user'];

        $sql_create_contact = "insert into contacts (topic, content, idUser) values ('$title', '$noidung', $id_user)";
        $query_create_contact = mysqli_query($connect, $sql_create_contact);
        echo "<script> alert('Gửi liên hệ thành công') </script>";
    }
}
else {
    // Trường hợp không có 'id_user' trong session, xử lý tương ứng
    echo "Bạn cần đăng nhập để sử dụng chức năng này!";
}
?>

<?php
$message = "";
$message_err = "";

if (isset($_POST['dangky'])) {
  $fullName = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $spaname = $_POST['spaname'];
  $bac = $_POST['bac'];
  $address =  $_POST['address'];
  $password = md5($_POST['password']);
//   $password_confirmation = md5($_POST['password_confirmation']);

  $sql_user = "SELECT * FROM users WHERE email = '$email'";
  $query_user = mysqli_query($connect, $sql_user);
  $count_user = mysqli_num_rows($query_user);
  if ($count_user != 0) {
    $message_err = "Tài khoản đã tồn tại";
    echo "<script> alert('$message_err') </script>";
  } else {
    if (!$fullName || !$phone || !$email || !$spaname || !$bac || !$address || !$password ) {
      $message_err = "Vui lòng nhập đầy đủ thông tin.";
        echo "<script> alert('$message_err') </script>";

    }
    else {
      $sql_dangky = "INSERT INTO users(fullName,phone,email,spaname,bac,address,password, isAdmin) VALUE('" . $fullName . "','" . $phone . "','" . $email . "','" . $spaname . "','" . $bac . "','" . $address . "','" . $password . "', 0)";
      $query_dangky = mysqli_query($connect, $sql_dangky);
      if ($query_dangky) {
        $message = "Đăng ký thành công. Tự động chuyển sang trang đăng nhập sau 3s...";
        echo 
        "<script>
        alert('$message') 
        setTimeout(() => {
          location.href = 'index.php?quanly=dangNhap'
        }, 3000)
        </script>";
      }
    }
  }
}
?>

<body>
    <div class="overlay hidden"></div>
    <div class="content" style="margin-top: 30px">
        <div class="container">
            <div class="lienhe_message" style="color: green; font-size: 16px; padding-top: 10px;">
            <?php echo $message  ?>
            </div>
            <div class="lienhe_message" style="color: red; font-size: 16px; padding-top: 10px;">
                <?php echo $message_err  ?>
            </div>
            <div class="registration__form">
                <div class="row">
                    <div class="col-sm-12 ">
                        <h3 class="heading">Liên Hệ</h3>
                        <p style="font-size: 18px; text-align: center;"><span style="font-weight: 400;">Đăng ký và nhận thông tin Chính sách đại lý </span></p>
                        <form action="" method="POST" class="form" id="form-1">
                        <div class="form-group form-group_top">
                            <label for="fullname" class="form-label">Họ tên</label>
                            <input id="fullname" name="fullname" type="text" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input id="phone" name="phone" type="text" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group form-group_top">
                            <label for="spaname" class="form-label">Tên spa/phòng khám da</label>
                            <input id="spaname" name="spaname" type="text" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <!-- <div class="form-group">
                            <label for="bac" class="form-label">Bậc đại lý</label>
                            <input id="bac" name="bac" type="bac" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div> -->
                        <div class="form-group">
                            <label for="bac" class="form-label">Bậc đại lý</label>
                            <select id="bac" name="bac" class="form-control">
                                <option value="bac1">Đại lý cơ bản</option>
                                <option value="bac2">Đại lý tiêu chuẩn</option>
                                <option value="bac3">Đại lý cao cấp</option>
                                <!-- Thêm các tùy chọn khác nếu cần -->
                            </select>
                            <span class="form-message"></span>
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input id="address" name="address" type="text" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group matkhau">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password" name="password" type="password" placeholder="" class="form-control">
                            <span class="form-message"></span>
                        </div>

                        <!-- <div class="form-group matkhau">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                            <input id="password_confirmation" name="password_confirmation" placeholder="" type="password" class="form-control">
                            <span class="form-message"></span>
                        </div> -->

                        <button class="form-submit btn-blocker" style="border-radius: unset;" name="dangky">
                            Đăng ký
                            <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i>
                        </button>
                        <p style="font-size: 14px;margin: 10px 0;">Bạn đã có tài khoản? <a href="index.php?quanly=dangNhap" style="color: black; font-weight: bold">Đăng nhập</a></p>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="mapregis">
                <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="wpb_wrapper">
			            <p><b>Trụ sở chính</b></p>
                        <ul>
                            <li>Biệt thự A10, khu đô thị Trung Hòa Nhân Chính, Q.Cầu Giấy, Hà Nội</li>
                        </ul>
                        <p><b>Văn phòng phía Nam</b></p>
                        <ul>
                            <li><span style="font-weight: 400;">763 Lê Hồng Phong, P.12, Q.10, Hồ Chí Minh</span></li>
                        </ul>
                        <p><b>Hotline</b><span style="font-weight: 400;">: </span></p>
                        <ul>
                            <li><span style="font-weight: 400;">0911 463 588</span></li>
                        </ul>
                        <p><b>Fanpage:</b></p>
                        <ul>
                            <li style="white-space: nowrap;"><a href="https://www.facebook.com/juliettearmandvietnam">https://www.facebook.com/juliettearmandvietnam</a></li>
                        </ul>

		            </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="mapbox">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.538780844769!2d105.79973921493237!3d21.011117486007965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca0e80fceb7%3A0x446d66753867c295!2sJuliette%20Armand%20Vi%E1%BB%87t%20Nam!5e0!3m2!1svi!2s!4v1618046718581!5m2!1svi!2s" width="600" height="450" style="border: 0px; pointer-events: auto;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-12">
                    <!-- <h3 style="text-align: center; margin-top:30px;border-top:1px solid #333;padding-top:10px">Bản đồ cửa hàng</h3> -->
                </div>
                </div>
            </div>    
        </div>
    </div>
</body>
<script src="../../assets//main.js"></script>
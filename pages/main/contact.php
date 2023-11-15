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

<body>
    <div class="overlay hidden"></div>
    <div class="content" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="info-shop">
                        <h3 class="title-heading">Thông tin liên hệ</h3>
                        <ul class="contact-info">
                            <li style="font-size: 18px; margin-bottom: 24px">Smart Point SHOP xin hân hạnh phục vụ quý khách.</li>
                            <li class="footer__item">
                                <p style="font-size: 16px;"><i class="fas fa-search-location footer__item-icon"></i> Minh Khai, Bắc Từ Liêm, Hà Nội</p>
                            </li>
                            <li class="footer__item">
                                <p style="font-size: 16px;"><i class="fas fa-phone-square-alt footer__item-icon"></i> Phone: <a href="tel:0123456789">0123456789</a></p>
                            </li>
                            <li class="footer__item">
                                <p style="font-size: 16px;"><i class="fas fa-envelope-square footer__item-icon"></i> Email: <a href="mailto:abc@gmail.com">tt@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="page-login">
                        <h3 class="title-heading">Gửi thông tin</h3>
                        <span class="text-contact">Bạn hãy điền nội dung tin nhắn vào form dưới đây
                            và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.
                        </span>
                        <form action="" method="POST" class="form" id="form-1">
                            <div class="form-group">
                                <label for="fullname" class="form-label">Tên đầy đủ</label>
                                <input id="fullname" name="fullname" type="text" placeholder="VD: Lưu Tuấn Thành" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input id="phone" pattern="[0-9]{10}" name="phone" type="tel" placeholder="0912*******" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input id="title" name="title" type="text" placeholder="VD: Hỗ trợ bảo hành" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <label for="phone" class="form-label">Nội dung</label>
                            <div class="form-group">
                                <textarea name="noidung" id="noidung" cols="70" rows="10"></textarea>
                                <span class="form-message"></span>
                            </div>

                            <button class="form-submit btn-blocker" style="border-radius: unset;">Gửi tin nhắn<i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <h3 style="text-align: center; margin-top:30px;border-top:1px solid #333;padding-top:10px">Bản đồ cửa hàng</h3>
                    <div class="mapbox">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.4737884535357!2d105.73252651180769!3d21.053730980520893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2sHanoi%20University%20of%20Industry!5e0!3m2!1sfr!2s!4v1700045646766!5m2!1sfr!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../../assets//main.js"></script>
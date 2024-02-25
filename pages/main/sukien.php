<style>

</style>

<div class="sukien">
    <div class="container">
        <div class="sukien_slide">
            <div class="sukien_slide-intro4">
                <div class="wpb_wrapper">
			        <h2 style="text-align: center;"><b>Kiến thức sự kiện</b></h2>
                    <p style="text-align: center;"><span style="font-weight: 400;">Những nghiên cứu chuyên sâu cùng kinh nghiệm trực tiếp trị liệu thành công cho hàng nghìn làn da trên toàn quốc là tâm huyết Juliette Armand dành tặng tới các chủ SPA.</span></p>
		        </div>
            </div>
        </div>
        
        <!-- <div class="sukien_slide2">
            <div class="sukien_slide-intro2">
                <div class="wpb_wrapper">
			        <h2 style="text-align: center;"><b>Giải mã bản đồ làn da</b></h2>
                    <p style="text-align: center;">Với tính khoa học, sát với thực tế điều trị giúp Spa/Tmv hiểu gốc rễ cách thức làn da vận hành và căn nguyên cũng như tiến trình sai lệch trong vận hành của bộ máy da dẫn đến các rối loạn về chức năng, từ đó gây nên những khiếm khuyết biểu hiện trên da, chính là bộ công cụ hoàn hảo giúp chuẩn hoá chuyên môn về da liễu, nâng cao chất lượng điều trị và uy tín thương hiệu hiệu quả.</p>
                    <p style="text-align: center;"><span style="color: #57c9e8;"><a class=" more" style="color: #57c9e8;" href="/giai-ma-ban-do-lan-da/">Tìm hiểu thêm &gt;</a></span></p>

		        </div>
            </div>
        </div>

        <div class="sukien_slide3">
            <div class="sukien_slide-intro3">
                <div class="wpb_wrapper">
			        <h2 style="text-align: center;"><b>Catalogue<br>
                    </b><b>&amp; Cẩm nang trị liệu</b></h2>
                    <p style="text-align: center;"><span style="font-weight: 400;">Juliette Armand cung cấp đầy đủ và minh bạch thông tin sản phẩm, hướng dẫn sử dụng, các bí quyết áp dụng trị liệu và kết hợp sản phẩm về nhà qua các ấn phẩm: Catalogue trị liệu chuyên nghiệp, Catalogue trị liệu tại nhà, Cẩm nang xây dựng phác đồ &amp; Ứng dụng trị liệu JA.</span></p>
                    <p style="text-align: center;"><span style="color: #57c9e8;"><a class=" more" style="color: #57c9e8;" href="/catalogue-cam-nang-tri-lieu/">Tìm hiểu thêm &gt;</a></span></p>
		        </div>
	        </div>
        </div>

        <div class="sukien_slide4">
            <div class="sukien_slide-intro4">
                <div class="wpb_wrapper">
			        <h2 style="text-align: center;"><b>Đào tạo online</b></h2>
                    <p style="text-align: center;"><span style="font-weight: 400;">Khoá đào tạo online với kiến thức da liễu từ căn bản tới chuyên sâu, cập nhật những xu hướng làm đẹp hiện hành mới nhất.&nbsp;</span></p>
                    <p style="text-align: center;"><span style="font-weight: 400;">Tiện lợi – thức thời – thiết thực.</span></p>
                    <p style="text-align: center;"><span style="font-weight: 400;">Khoá đào tạo của Juliette Armand cam kết đi đầu về chất lượng với sự tham gia của những chuyên gia làm đẹp hàng đầu trong và ngoài nước.</span></p>
                    <p style="text-align: center;"><span style="color: #57c9e8;"><a class=" more" style="color: #57c9e8;" href="dao-tao-online">Tìm hiểu thêm &gt;</a></span></p>
		        </div>
	        </div>
        </div>

        <div class="sukien_slide5">
            <div class="sukien_silde-intro5">
                <div class="vc_column-inner vc_custom_1616245027877">
                    <div class="wpb_wrapper">
	                    <div class="wpb_text_column wpb_content_element  ">
		                    <div class="wpb_wrapper">
			                    <p><img loading="lazy" class="aligncenter" src="https://www.juliettearmand.com/wp-content/uploads/2020/04/syringe.png" alt="Are you a professional?" width="50" height="356"></p>
                                <p style="text-align: center;"><strong>Bạn có phải là Chủ Spa / </strong><strong>Thẩm Mỹ Viện?</strong></p>
                                <p style="text-align: center;">Xin vui lòng Đăng ký và nhận thông tin Chính sách đại lý tại đây.</p>
                                <p style="text-align: center;"><span style="color: #57c9e8;"><a class=" more" style="color: #57c9e8;" href="">Liên Hệ</a> </span></p>
		                    </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php
            $sql_news_list = "SELECT * FROM news";
            $query_show = mysqli_query($connect, $sql_news_list);
        ?>

        <body>
            <div class="overlay hidden"></div>
        <!-- content -->
        <div class="">
            <div class="container">
                <div class="row mb-20" style="margin: 20px 0;" id="news">

                </div>
            </div>
        </div>
        <div class="loadmore">
            <a class="loadmore-btn" style="cursor: pointer;">Tải thêm</a>
        </div>

        <!-- end content -->
        <div id="go-to-top">
            <a class="btn-gototop"><i class="fas fa-arrow-up"></i></a>
        </div>

        </body>

        <script src="./assets/js/main.js"></script>
        <script>
        var page = 1;
        var apiNews = [
        <?php
        $sizeOfPage = 6;
        $currentPage = 1;
        $cnt = 1;
        while ($row = mysqli_fetch_array($query_show)) {
        ?> {
                id: <?php echo $row['id'] ?>,
                name: '<?php echo $row['title'] ?>',
                description: ' <?php echo $row['short_description'] ?>',
                img: './img/news/<?php echo $row['image'] ?>',

                page: <?php
                        if ($cnt <= $sizeOfPage) {
                            echo $currentPage;
                            $cnt++;
                        } else {
                            $cnt = 2;
                            $currentPage++;
                            echo $currentPage;
                        }

                        ?>
            },
        <?php
        }
        ?>
    ]
    var listItem = document.querySelector('#news');
    console.log(listItem);

    function initRender() {
        var listNews = apiNews.map(function(apiNew) {
            if (apiNew.page == page) {
                return `<div class="col-lg-4 col-md-6 col-sm-12 mb-20" style="margin-bottom: 20px">
                    <a href="index.php?quanly=news_detail&id=${apiNew.id}" class="product__new-item">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="${apiNew.img}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">
                            ${apiNew.name}
                          </h5>
                          <p class="card-text custom__name-product" style="font-weight: 400;">${apiNew.description}</p>
                        </div>
                    </div>
                    </a>
                  </div>`
            }
        })
        var renderList = listNews.join('');
        listItem.innerHTML = renderList;
    }
    initRender();
    var btnLoadMore = document.querySelector('.loadmore-btn');

    function render() {
        var listNews = apiNews.map(function(apiNew) {
            if (apiNew.page == page) {
                return `<div class="col-lg-4 col-md-6 col-sm-12 mb-20" style="margin-bottom: 20px">
                    <a href="index.php?quanly=news_detail&id=${apiNew.id}">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="${apiNew.img}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">
                            ${apiNew.name}
                          </h5>
                          <p class="card-text custom__name-product" style="font-weight: 400;">${apiNew.description}</p>
                        </div>
                    </div>
                    </a>
                  </div>`
            }
        })
        var renderList = listNews.join('');
        $('#news').append(listNews);
    }

    $(btnLoadMore).click(function() {
        page++;
        render();
        if (page > 3) {
            $(btnLoadMore).fadeOut();
        }

    })
    </script>
    </div>
</div>



















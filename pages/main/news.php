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

</html>
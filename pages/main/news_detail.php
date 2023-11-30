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

  .content-page p {
    font-size: 16px;
    padding: 5px 0;
    word-wrap: break-word;
    text-align: center;
  }

  .content-page p img {
    width: auto;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
    height: initial !important;
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
      <?php
      $sql_chitiet = "SELECT * FROM news WHERE id = '$_GET[id]' LIMIT 1";
      $query_chitiet = mysqli_query($connect, $sql_chitiet);
      while ($row_detail = mysqli_fetch_array($query_chitiet)) {
      ?>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="page-title">
              <h1 class="title-head" style="font-size: 30px">
                <strong> <?php echo $row_detail['title'] ?></strong>
              </h1>
            </div>
            <div class="content-page">
              <span class="time" style="font-size: 18px; color: #999;"><i class="far fa-clock" style="margin-right: 10px;"></i><?php echo $row_detail['createdAT'] ?></span>
              <p style="font-weight: bold">
                <?php echo $row_detail['short_description'] ?>
              </p>
              <p>
                <img src="admin/news_management/uploads/<?php echo $row_detail['image'] ?>" alt="">
              </p>

              <p>
                <?php echo $row_detail['content'] ?>
              </p>


            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <div id="go-to-top">
    <a class="btn-gototop"><i class="fas fa-arrow-up"></i></a>
  </div>

</body>
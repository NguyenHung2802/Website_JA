<div class="search_main">
    <div class="container">
        <div class="topdistance"></div>
        <div class="mfp-container">
            <div class="mfp-content">
                <div class="thb-close-text">PRESS ESC TO CLOSE</div>
                <button title="Close (Esc)" class="mfp-close">
                    <i class="fa-solid fa-x"></i>
                </button>
                <form class="example" method="post" action="index.php?quanly=showAllProduct&page=1" id="searchForm">
                    <input type="text" class="input-search" placeholder="Tìm kiếm.." value="<?php echo $search ?>" name="search" id="searchInput">
                    <button type="submit" value="btn" name="search-btn" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="mfp-preloader">Loading...</div>
        </div>
    </div>
</div>

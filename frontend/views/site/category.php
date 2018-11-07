<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Shop Category Page</h2>
                <div class="page_link">
                    <a href="#">Home</a>
                    <a href="#">Category</a>
                    <a href="#">Women Fashion</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area p_120">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="product_top_bar">
                    <div class="left_dorp">
                        <select class="sorting">
									<option value="1">Default sorting</option>
									<option value="2">Default sorting 01</option>
									<option value="4">Default sorting 02</option>
								</select>
                        <select class="show">
									<option value="1">Show 12</option>
									<option value="2">Show 14</option>
									<option value="4">Show 16</option>
								</select>
                    </div>
                    <div class="right_page ml-auto">
                        <nav class="cat_page" aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item blank"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="latest_product_inner row">

                    <?php foreach ($items as $item): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img class="img-fluid" src="/img/product/feature-product/f-p-1.jpg" alt="">
                                <div class="p_icon">
                                    <a href="#"><i class="lnr lnr-heart"></i></a>
                                    <a href="#"><i class="lnr lnr-cart"></i></a>
                                </div>
                            </div>
                            <a href="#">
                                <h4>
                                    <?= $item->name ?>
                                </h4>
                            </a>
                            <h5>
                                <?= $item->getPriceWithDiscount() ?>
                            </h5>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets cat_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li><a href="#">Fruits and Vegetables</a></li>
                                <li>
                                    <a href="#">Meat and Fish</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Cooking</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Beverages</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Home and Cleaning</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Product Filters</h3>
                        </div>
                        <div class="widgets_inner">
                            <h4>Brand</h4>
                            <ul class="list">
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Asus</a></li>
                                <li class="active"><a href="#">Gionee</a></li>
                                <li><a href="#">Micromax</a></li>
                                <li><a href="#">Samsung</a></li>
                            </ul>
                        </div>
                        <div class="widgets_inner">
                            <h4>Color</h4>
                            <ul class="list">
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Black Leather</a></li>
                                <li class="active"><a href="#">Black with red</a></li>
                                <li><a href="#">Gold</a></li>
                                <li><a href="#">Spacegrey</a></li>
                            </ul>
                        </div>
                        <div class="widgets_inner">
                            <h4>Price</h4>
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <div class="row m0">
                                    <label for="amount">Price : </label>
                                    <input type="text" id="amount" readonly>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!--================Most Product Area =================-->
<section class="most_product_area most_p_withoutbox">
    <div class="container">
        <div class="main_title">
            <h2>Most Searched Products</h2>
            <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row most_product_inner">
            <div class="col-lg-3 col-sm-6">
                <?php foreach ($items as $item): ?>
                <div class="most_p_list">
                    <div class="media">
                        <div class="d-flex">
                            <img src="/img/product/most-product/m-product-1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <a href="#">
                                <h4>
                                    <?= $item->name ?>
                                </h4>
                            </a>
                            <h3>$189.00</h3>
                        </div>
                    </div>

                </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</section>
<!--================End Most Product Area =================-->
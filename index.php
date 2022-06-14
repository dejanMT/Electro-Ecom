<?php require_once("resources/config.php"); ?>
<!-- Nav -->
<?php include("resources/templates/header.php"); ?>

    <main>
        <!--Banner Area Start -->
        <section class="banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="banner-area__content">
                            <h2>Premium products
                                for premium people.</h2>
                            <p>Shop with us!</p>
                            <a class="btn bg-primary" href="shop.php">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="banner-area__img">
                            <img src="dist/images/heroBanner.jpg" alt="banner-img" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="brand-area">
                            <?php get_brands(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Banner Area End -->

        <!-- Features Section Start -->
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                </div>
                <div class="features-wrapper">
                    <div class="features-active">
                        <!-- Product Start -->
                            <?php show_featured_product(); ?>
                        <!-- Product End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->

        <!-- About Area Start -->
        <section class="about-area">
            <div class="container">
                <div class="about-area-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 ">
                            <div class="about-area-content-img">
                                <img src="dist/images/iPhone.jpg" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-area-content-text">
                                <h3>Why Shop with Electro</h3>
                                <p>Brilliant Discounts on Laptops, Smartphones, Tablets, Gaming, Television & More.</p>
                                <div class="icon-area-content">
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>Secure Payment Method.</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>24/7 Customers Services.</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>Free Shipping</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>100% Money guarantee</span>
                                    </div>
                                </div>
                                <?php 
                                    if (!isset($_SESSION['emailOrNo'])) {
                                        echo '<a class="btn bg-primary" href="shop.php">Start Shopping</a>';
                                    } else {
                                        echo '<a class="btn bg-primary" href="dashboard.php">Dashboard</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->

        <!-- Populer Product Strat -->
        <section class="populerproduct">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>New Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--New Product Start-->
                    <?php show_new_product(); ?>
                    <!--New Product End-->
                </div>
            </div>
        </section>
        <!-- Populer Product End -->

        <!-- Features Section Start -->
        <section class="customersreview">
            <div class="container mt-15">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>What Our Customers Says</h2>
                        </div>
                    </div>
                </div>
                <div class="customersreview-wrapper">
                    <div class="customersreview-active">
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Ryan Ford</h6>
                                <span>Content Writer</span>
                            </div>
                        </div>
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Tyler Wood</h6>
                                <span>Fashion Designer</span>
                            </div>
                        </div>
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Ryan Ford</h6>
                                <span>Content Writer</span>
                            </div>
                        </div>
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Tyler Wood</h6>
                                <span>Fashion Designer</span>
                            </div>
                        </div>
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Ryan Ford</h6>
                                <span>Content Writer</span>
                            </div>
                        </div>
                        <div class="customersreview-item">
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                            <div class="name">
                                <h6>Tyler Wood</h6>
                                <span>Fashion Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                    d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                    d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                    fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->

        <?php 
             if (!isset($_SESSION['emailOrNo'])) {
                $newsLetter = <<<LIMITER
                    <div class="container customersreview">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-wrapper">
                            <div class="d-flex subscription-content justify-content-between align-items-center flex-column flex-md-row text-center text-md-left">
                                <h3 class="flex-fill">Subscribe <br> to our newsletter</h3>
                                <form action="#" class="row flex-fill">
                                <div class="col-lg-7 my-md-2 my-2">
                                    <input type="email" class="form-control px-4 border-0 w-100 text-center text-md-left" id="email" placeholder="Your Email" name="email">
                                </div>
                                <div class="col-lg-5 my-md-2 my-2">
                                    <button type="submit" class="btn btn-primary btn-lg border-0 w-100">Subscribe Now</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                LIMITER;

                echo $newsLetter;
            }
        ?>
    </main>

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
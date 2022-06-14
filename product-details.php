<?php require_once("resources/config.php"); ?>
<!-- Nav -->
<?php include("resources/templates/header.php"); ?>

<?php 
    if (!isset($_SESSION['emailOrNo'])) {
        redirect("index.php");
    }
?>


<?php
    $query = query("SELECT * FROM item_tbl WHERE itemId = " . escape_string($_GET['id']) . ";");
    confirm($query);

    while ($row = mysqli_fetch_array($query)) {
        $productId = $row['itemId'];
        $productName = $row['itemName'];
        $productPrice = $row['itemPrice'];
        $oldPrice = $productPrice + 15;
        $productDesc = $row['itemDescription'];
        $itemQuantity = $row['itemQuantity'];
        $itemImage = "{$row['itemPicture']}";
    }
?>

    <main>
        <!--Breadcrumb Area Start -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="shop.php">Shop</a></li>
                                <li class="breadcrumb-item" aria-current="page"><?php echo $productName; ?></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                        <h5>Detail</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--Breadcrumb Area End -->

        <?php order_product(); ?>
        <h5 class="bg-success text-center pd-2"><?php display_message(); ?></h5>

        <!-- Product Details Area Start -->
        <section class="product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="product-slider">
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        <li><img src="<?php echo $itemImage; ?>" /></li>
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="product-pricelist">
                            <h2><?php echo $productName; ?></h2>
                            <div class="product-pricelist-ratting">
                                <div class="price">
                                    <span>$&#8203;<?php echo $productPrice; ?></span> <del>$&#8203;<?php echo $oldPrice; ?></del>
                                </div>
                                <div class="price">
                                    <span>QTY. <?php echo $itemQuantity; ?></span>
                                </div>
                            </div>
                            <p><?php echo $productDesc; ?></p>
                            
                            <div class="product-pricelist-selector-button mt-15">
                                <form action="product-details.php?id=<?php echo $productId; ?>" method="post">
                                    <button class="btn cart-bg" type="submit" name="orderProduct">Order
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    </button>
                                </form>
                                    
                                <div class="product-pricelist-selector-button-item">
                                    <div class="shipping">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.4" height="17.937"
                                                viewBox="0 0 21.4 17.937">
                                                <g id="Truck_Icon" data-name="Truck Icon"
                                                    transform="translate(-0.8 -3.8)">
                                                    <path id="Path_14" data-name="Path 14" d="M1.5,4.5H15.112V16.3H1.5Z"
                                                        fill="none" stroke="#335aff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.4" />
                                                    <path id="Path_15" data-name="Path 15"
                                                        d="M24,12h3.63l2.722,2.722V19.26H24Z"
                                                        transform="translate(-8.852 -3)" fill="none" stroke="#335aff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.4" />
                                                    <path id="Path_16" data-name="Path 16"
                                                        d="M9.037,26.269A2.269,2.269,0,1,1,6.769,24a2.269,2.269,0,0,1,2.269,2.269Z"
                                                        transform="translate(-1.185 -7.5)" fill="none" stroke="#335aff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.4" />
                                                    <path id="Path_17" data-name="Path 17"
                                                        d="M28.537,26.269A2.269,2.269,0,1,1,26.269,24,2.269,2.269,0,0,1,28.537,26.269Z"
                                                        transform="translate(-8.852 -7.5)" fill="none" stroke="#335aff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.4" />
                                                </g>
                                            </svg>

                                        </div>
                                        <p>Free Shipping Cast</p>
                                    </div>
                                    <div class="delivery">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5"
                                                viewBox="0 0 17.5 17.5">
                                                <g id="Icon" transform="translate(-2.25 -2.25)">
                                                    <path id="Path_20" data-name="Path 20"
                                                        d="M19,11a8,8,0,1,1-8-8A8,8,0,0,1,19,11Z" fill="none"
                                                        stroke="#335aff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                    <path id="Path_21" data-name="Path 21" d="M18,9v4.8l3.2,1.6"
                                                        transform="translate(-7 -2.8)" fill="none" stroke="#335aff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </svg>
                                        </div>
                                        <p>3 Days Delivery Time</p>
                                    </div>
                                    <div class="cash">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16"
                                                viewBox="0 0 10 16">
                                                <path id="Icon"
                                                    d="M14.863,11.522c-2.23-.524-2.947-1.067-2.947-1.911,0-.969.992-1.644,2.652-1.644,1.749,0,2.4.756,2.456,1.867H19.2a3.655,3.655,0,0,0-3.153-3.387V4.5H13.095V6.42c-1.906.373-3.438,1.493-3.438,3.209,0,2.053,1.876,3.076,4.617,3.671,2.456.533,2.947,1.316,2.947,2.142,0,.613-.481,1.591-2.652,1.591-2.024,0-2.819-.818-2.927-1.867H9.48c.118,1.947,1.729,3.04,3.615,3.4V20.5h2.947V18.589c1.916-.329,3.438-1.333,3.438-3.156C19.48,12.909,17.093,12.047,14.863,11.522Z"
                                                    transform="translate(-9.48 -4.5)" fill="#335aff" />
                                            </svg>
                                        </div>
                                        <p>Cash on Delivery</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Details Area End -->

        <!-- Features Section Start -->
        <section class="features bg-lightwhite">
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="features-morebutton text-center">
                            <a class="btn bt-glass" href="shop.php">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->
    </main>

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
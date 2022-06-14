<?php require_once("resources/config.php"); ?>
<!-- Nav -->
<?php include("resources/templates/header.php"); ?>

<?php 
    if (!isset($_SESSION['emailOrNo'])) {
        redirect("login.php");
    }
?>

    <main>

        <!-- BreadCrumb Start-->
        <section class="breadcrumb-area mt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                        <h5>Shop</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- BreadCrumb Start-->

        <!-- Populer Product Strat -->
        <section class="populerproduct bg-white p-0 shop-product mt-15">
            <div class="container">
                <div class="row">
                    <?php show_product_in_shop(); ?>
                </div>
            </div>
        </section>
        <!-- Populer Product End -->
    </main>

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
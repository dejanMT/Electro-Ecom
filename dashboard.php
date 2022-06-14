<?php require_once("resources/config.php"); ?>
<?php include("resources/templates/header.php"); ?>

<?php 
    if (!isset($_SESSION['emailOrNo'])) {
        redirect("login.php");
    }
?>

    <main>
        <!-- Breadcrumb Area Start -->
        <section class="breadcrumb-area mt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php get_Page_Name(); ?></li>
                            </ol>
                        </nav>
                        <h5><?php get_Page_Name(); ?></h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Area End. -->

        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Dashboard Nav Start-->
                        <div class="dashboard-nav">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="?settings" class="<?php if(isset($_GET['settings'])){echo "active";} ?>">Account Settings</a></li>
                                <li class="list-inline-item"><a href="?orders" class="<?php if(isset($_GET['orders'])){echo "active";} ?>">Order</a></li>
                                <li class="list-inline-item"><a href="?listProduct" class="<?php if(isset($_GET['listProduct'])){echo "active";} ?>">List Product</a></li>
                                <li class="list-inline-item"><a href="?listBrand" class="<?php if(isset($_GET['listBrand'])){echo "active";} ?>">List Brand</a></li>
                                <li class="list-inline-item"><a href="dashboard/logout.php" class="mr-0">Log-out</a></li>
                            </ul>
                        </div>
                        <!-- Dashboard Nav End-->
                        <?php display_alert_message(); ?>
                        
                    <!--/-->


                    <?php 
  
                        if(isset($_GET['orders'])){
                            include("dashboard/orders.php");
                        } else if(isset($_GET['listProduct'])){
                            include("dashboard/listProduct.php");
                        } else if(isset($_GET['listBrand'])){
                            include("dashboard/listBrand.php");
                        } else {
                            include("dashboard/settings.php");
                        }
                
                    ?>

                </div>
            </div>
        </section>
        <!--Dashboard Area End -->
    </main>

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
<?php require_once("includes/config.php"); ?>
<?php include("includes/templates/header.php"); ?>

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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account</li>
                            </ol>
                        </nav>
                        <h5>Account</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Area End. -->

        <!--Acount Area Start -->
        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Dashboard-Nav  Start-->
                        <div class="dashboard-nav">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="user-dashboard.html" class="active">Account
                                        settings</a></li>
                                <li class="list-inline-item"><a href="deliver-info.html">Billing information</a></li>
                                <li class="list-inline-item"><a href="wishlist.html">My wishlist</a></li>
                                <li class="list-inline-item"><a href="cart.html">My cart</a></li>
                                <li class="list-inline-item"><a href="order.html">Order</a></li>
                                <li class="list-inline-item"><a href="account.html" class="mr-0">Log-out</a></li>
                            </ul>
                        </div>
                        <!-- Dashboard-Nav  End-->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-setting">
                            <h6>Account setting</h6>
                            <form action="#">
                                <div class="form__div">
                                    <input type="text" class="form__input" placeholder="
                                    ">
                                    <label for="" class="form__label">Full Name</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" class="form__input" placeholder="
                                    ">
                                    <label for="" class="form__label">Email</label>
                                </div>
                                <button type="submit" class="btn bg-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="change-password">
                            <h6>Change password</h6>
                            <form action="#">
                                <div class="form__div">
                                    <input type="password" class="form__input" placeholder=" ">
                                    <label for="" class="form__label">Current password</label>
                                </div>
                                <div class="form__div">
                                    <input type="password" class="form__input" placeholder=" ">
                                    <label for="" class="form__label">New passwords</label>
                                </div>
                                <div class="form__div mb-40">
                                    <input type="password" class="form__input" placeholder=" ">
                                    <label for="" class="form__label">Confirm passwords</label>
                                </div>
                                <button type="submit" class="btn bg-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--Acount Area End -->

    </main>

<!-- Footer -->
<?php include("includes/templates/footer.php"); ?>
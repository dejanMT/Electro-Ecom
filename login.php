<?php   
    require_once("resources/config.php");
    include("resources/templates/header.php"); 

    if (isset($_SESSION['emailOrNo'])) {
        redirect("dashboard.php");
    }
?>
    
    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <div class="container">  
                <div class="account-sign-in">
                    <h5 class="text-center">Log in</h5>
                    <h6 class="settingPageErrors text-center bg-light p-2"><?php login_user(); ?></h6>
                    <form action="login.php" method="post" enctype="multipart/form-data" onSubmit="return loginFormValidate();">
                        <div class="form__div">
                            <input type="text" class="form__input" placeholder=" " name="emailOrNo" id="emailOrNo">
                            <label for="emailOrNo" class="form__label">Email/Mobile Number</label>
                        </div>
                        <div class="form__div mb-20">
                            <input type="password" class="form__input" placeholder=" " name="password" id="password">
                            <label for="password" class="form__label">Password</label>
                        </div>

                        <input type="submit" value="Login" name="login" class="btn bg-primary">
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php 
    include("resources/templates/footer.php");
?>
<?php 
    require_once("resources/config.php"); 
    include("resources/templates/header.php"); 

    if (isset($_SESSION['emailOrNo'])) {
        redirect("dashboard.php");
    }
?>

    <main>
        <!-- Account-Signup -->
        <section class="account-sign">
            <div class="container">  
                <div class="account-sign-up">
                    <h5 class="text-center">Sign up</h5>
                    <h4 class="settingPageErrors text-center bg-light p-2"><?php add_user(); ?></h4>
                    <form method="post" enctype="multipart/form-data" onSubmit="return signInFormValidate();">
                        <!--
                        <div class="form__div">
                             upload pic here 
                            <div class="profile-pic-wrapper">
                                <div class="pic-holder">
                                    <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150?person">

                                    <Input class="uploadProfileInput" type="file" name="profilePic" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                    <label for="newProfilePhoto" class="upload-file-block">
                                        <div class="text-center">
                                            <div class="mb-2">
                                            <i class="fa fa-camera fa-2x"></i>
                                            </div>
                                            <div class="text-uppercase">
                                            Update <br /> Profile Photo
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="form__div">
                            <input type="file" id="myFile" name="profilePic">
                        </div>
                        <div class="form__div">
                            <input type="text" class="form__input" placeholder=" " name="name" id="userName">
                            <label for="name" class="form__label">Name</label>
                        </div>
                        <div class="form__div">
                            <input type="text" class="form__input" placeholder=" " name="surname" id="userSurname">
                            <label for="surname" class="form__label">Surname</label>
                        </div>
                        <div class="form__div">
                            <input type="text" class="form__input" placeholder=" " name="number" id="userNumber">
                            <label for="number" class="form__label">Mobile Number</label>
                        </div>
                        <div class="form__div">
                            <input type="text" class="form__input" placeholder=" " name="email" id="userEmail">
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__div">
                            <input type="password" class="form__input" placeholder=" " name="password" id="userPassword">
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__div mb-20">
                            <input type="password" class="form__input" placeholder=" " name="confPassword" id="UserConfPassword">
                            <label for="confPassword" class="form__label">Repeat Password</label>
                        </div>

                        <input type="submit" value="Sing up" name="signup" class="btn bg-primary">
                    </form>
                </div>
            </div>
        </section>
    </main>

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
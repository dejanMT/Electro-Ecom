    <div class="p-2">
        <h5 class="settingPageErrors text-center bg-light p-2">
            <?php 
                changePassword(); 
                updateProfile(); 
            ?>
        </h5>
    </div>
</div>
<div class="col-lg-6 col-md-12">
    <div class="change-password">
        <h6>Change password</h6>
        <form action="dashboard.php?settings" method="post" onSubmit="return changePasswordFormValidate();">
            <div class="form__div">
                <input type="password" class="form__input" name="currentPassword" id="currentPassword" placeholder=" ">
                <label for="" class="form__label">Current password</label>
            </div>
            <div class="form__div">
                <input type="password" class="form__input" name="newPassword" id="newPassword" placeholder=" ">
                <label for="" class="form__label">New passwords</label>
            </div>
            <div class="form__div mb-40">
                <input type="password" class="form__input" name="confirmNewPassword" id="confirmNewPassword" placeholder=" ">
                <label for="" class="form__label">Confirm passwords</label>
            </div>

            <input type="submit" value="Save Changes" name="updatePassword" class="btn bg-primary">
        </form>
    </div>
</div>

<?php
    $userEmailOrNum = $_SESSION['emailOrNo'];
    $query = query("SELECT * FROM users_tbl WHERE '{$userEmailOrNum}' = userEmail OR '{$userEmailOrNum}' = userNumber;");
    confirm($query);

    while ($row = mysqli_fetch_array($query)){
        $userName = escape_string($row['userName']);
        $lastName = escape_string($row['userSurname']);
        $profilePic = escape_string($row['userPicture']);
    }
?>

<div class="col-lg-6 col-md-12">
    <div class="account-setting">
        <h6>Account setting</h6>
        <form action="?settings" method="post" enctype="multipart/form-data">
            <div class="form__div">
                <input type="text" class="form__input" name="firstName" value="<?php echo $userName; ?>" placeholder=" ">
                <label for="" class="form__label">First Name</label>
            </div>
            <div class="form__div">
                <input type="text" class="form__input" name="lastName" value="<?php echo $lastName; ?>" placeholder=" ">
                <label for="" class="form__label">Last Name</label>
            </div>
            <div class="form__div">
                <input type="file" class="form__input" name="profilePic" value="<?php echo $profilePic; ?>">
                <label for="" class="form__label">Profile Picture</label>
            </div>

            <input type="submit" value="Save Changes" name="updateProfile" class="btn bg-primary">
        </form>
    </div>
</div>

<div class="container mt-15">
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Delete Account
        </button>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete your account?<br><small>This cannot be undone.</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="resources/templates/back/deleteAccount.php" class="btn btn-primary">Yes, I'm sure</a>
      </div>
    </div>
  </div>
</div>
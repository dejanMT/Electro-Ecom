<?php
  if (isset($_SESSION['emailOrNo'])) {
    $userEmailOrNum = $_SESSION['emailOrNo'];
    $query = query("SELECT `userPicture` FROM `users_tbl` WHERE '{$userEmailOrNum}' = `userEmail` OR '{$userEmailOrNum}' = `userNumber`;");
    confirm($query);

    while ($row = mysqli_fetch_array($query)){
        $profilePic = escape_string($row['userPicture']);
    }
  }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="dist/images/logo/electroLogo.png" alt="Company Logo" width="180"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <?php
        if (isset($_SESSION['emailOrNo'])) {
          $logedNav = <<<LIMITER
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
          LIMITER;
          echo $logedNav;
        }
      ?>
    </ul>
  </div>

  <?php
    if (isset($_SESSION['emailOrNo'])) {
      $userDropdown = <<<LIMITER
        </div>
          <div class="dropdown float-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img width="30" height="30" style="border-radius:100%;" src="$profilePic" alt="Profile Picture">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
              <a class="dropdown-item" href="dashboard.php?settings">Profile</a>
              <a class="dropdown-item" href="dashboard.php?orders">My Orders</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="dashboard/logout.php">Log Out</a>
            </div>
        </div>
      LIMITER;
      echo $userDropdown;
    } else {
      $userDropdown = <<<LIMITER
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- User Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
            <a class="dropdown-item" href="signup.php">Sign Up</a>
            <a class="dropdown-item" href="login.php">Log In</a>
          </div>
        </div>
      LIMITER;
      echo $userDropdown;
    }
  ?>
</nav>
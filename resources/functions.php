<?php
    //===============================================================
    //===============================================================
    //===============================================================
    //---------------------Helper Functions--------------------------
    //===============================================================
    //===============================================================
    //===============================================================

    function redirect($location){
        //For live server
       // return "<script type='text/javascript'> window.location.href = '$location'; <script>"; exit;

       //For LocalHost
       return header("Location: $location");
    }

    function escape_string($string){
        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }

    function query($sql){
        global $connection;
        return mysqli_query($connection, $sql);
    }

    function confirm($result){
        global $connection;
        if(!$result){
            die("Query Failed: " . mysqli_error($connection));
        }
    }

    function display_image($picture){
        return "Uploads" . DS . $picture;
    }

    function set_message($message){
        if(!empty($message)){
            $_SESSION['message'] = $message;
        } else {
            $message = "";
        }
    }

    function display_message(){
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    function set_alert_message($title, $message, $alertType){
        if(!empty($message)){
            $alertInfo = array($title, $message, $alertType);
            $_SESSION['alertMessage'] = $alertInfo;
            unset($_SESSION['message']);
        }
    }

    function display_alert_message(){
        if (isset($_SESSION['alertMessage'])) {

            if($_SESSION['alertMessage'][2]){
                $displayAlert = <<<LIMIT
                    <div class="alert alert-success alert-dismissible fade show" id="alertMessage" role="alert">
                        <strong>{$_SESSION['alertMessage'][0]}</strong> {$_SESSION['alertMessage'][1]}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                LIMIT;
            } else {
                $displayAlert = <<<LIMIT
                    <div class="alert alert-danger alert-dismissible fade show" id="alertMessage" role="alert">
                        <strong>{$_SESSION['alertMessage'][0]}</strong> {$_SESSION['alertMessage'][1]}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                LIMIT;
            }

            echo $displayAlert;
            unset($_SESSION['alertMessage']);
        } 

        
    }


    //===============================================================
    //===============================================================
    //===============================================================
    //-------------------------Functions-----------------------------
    //===============================================================
    //===============================================================
    //===============================================================

    function add_brand(){
        if (isset($_POST['addBrand'])) {
            $brandName = escape_string($_POST['brandName']);
            $brandDesc = escape_string($_POST['brandDesc']);

            $brandPic = escape_string("resources/Uploads/Brands/" . $_FILES['brandPic']['name']);
            $image_temp_location = escape_string($_FILES['brandPic']['tmp_name']);

            if (!empty($brandName) && !empty($brandDesc) && !empty($brandPic) && !empty($brandPic)) {
                if (strlen($brandName) > 3 && strlen($brandDesc) > 15) {
                    if (!is_numeric($brandName) && !is_numeric($brandDesc)) {
                        //move_uploaded_file() didn't  work, so I tried copy() and it worked.
                        copy($image_temp_location, $brandPic);

                        $query = query("INSERT INTO brand_tbl (brandPicture, brandName, brandDescription)
                                        VALUES ('{$brandPic}', '{$brandName}', '{$brandDesc}');");
        
                        confirm($query);
                        set_alert_message("Success: ", "Brand added!", true);
                    } else {
                        echo "Make sure brand name and descrion are datatype: String.";
                    }
                  
                } else {
                    echo "Make sure the Brand name has more than 3 charachers and descripion has more than 15 charachers.";
                }
    
            } else {
                echo "All fields must be filled!";
            }
           
        }
    }

    function get_brands(){
        $query = query("SELECT * FROM brand_tbl;");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $displayBrands = <<<LIMIT
                <div class="brand-area-image">
                    <img src="{$row['brandPicture']}" alt="Brand Logo" class="img-fluid">
                </div>
            LIMIT;

            echo $displayBrands;
        }
    }

    function show_all_brands(){
        $query = query("SELECT * FROM brand_tbl;");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $displayBrands = <<<LIMIT
                <tr>
                    <td>{$row['brandId']}</td>
                    <td>{$row['brandName']}</td>
                    <td>{$row['brandDescription']}</td>
                    <td><img src="{$row['brandPicture']}" width="200" alt="Brands Logo"></td>
                    <td><a href="resources/templates/back/deleteBrand.php?id={$row['brandId']}">Delete</a></td>
                </tr>
            LIMIT;

            echo $displayBrands;
        }
    }

    function is_Valid_Email($email){ 
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
 
    function login_user() {
        if(isset($_POST['login'])) {
            $emailOrNo = escape_string($_POST['emailOrNo']);
            $password = escape_string($_POST['password']);

            $query = query("SELECT * FROM users_tbl WHERE userEmail = '{$emailOrNo}' OR userNumber = '{$emailOrNo}' LIMIT 1;");
            confirm($query);

            if(mysqli_num_rows($query) == 0) {
                echo("Your Login is incorrect.<br>Please try again.");
            } else {
                while($row = mysqli_fetch_array($query)) {
                    if (password_verify($password, $row['password'])) {
                        if (session_status() === PHP_SESSION_NONE){
                            session_start();
                        } 
                        $_SESSION['emailOrNo'] = $emailOrNo;
                        redirect("dashboard.php");
                    } else {
                        echo("Your Password is incorrect.<br>Please try again.");
                    }
                }
            }

        }
    }
    
    
    function add_user() {
        if(isset($_POST['signup'])) {

            $valid = true;

            $name = escape_string($_POST['name']);
            $surname = escape_string($_POST['surname']);
            $number = escape_string($_POST['number']);
            $email = escape_string($_POST['email']);
            $password = trim(escape_string($_POST['password']));
            $confirm_password = trim(escape_string($_POST['confPassword']));

            $profilePic = escape_string("resources/Uploads/Profile/" . $_FILES['profilePic']['name']);
            $profile_temp = escape_string($_FILES['profilePic']['tmp_name']);

            if (!empty($name) && !empty($surname) && !empty($number) && !empty($email) && !empty($password) && !empty($confirm_password)) {
                if (is_Valid_Email($email) && strlen($number) == 8) {
                    if (is_string($name) && is_string($surname)) {
                        if (!(strlen($name) > 15) && !(strlen($surname) > 15)) {
                            if($password == $confirm_password){
                                $query = query("SELECT * FROM `users_tbl`;");
                                confirm($query);
                
                                while ($row = mysqli_fetch_array($query)) {
                                    if ($row['userNumber'] == $number) {
                                        $valid = false;
                                        echo "That mobile number is already in use, try another one or login.";
                                    }
                
                                    if($row['userEmail'] == $email){
                                        $valid = false;
                                        echo "That email is already in use, try another one or login.";
                                    }
                                }
                
                                if ($valid) {
                                    // hash password
                                    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
                                    
                                    if (!empty($profilePic)) {
                                        //move_uploaded_file() didn't  work, so I tried copy() and it worked.
                                        copy($profile_temp, UPLOAD_FOLDER .  DS . $profilePic);
                                    } else {
                                        $profilePic = "defaultImg.jpg";
                                    }
                                    
                                    $query = query("INSERT INTO users_tbl (userName, userSurname, userEmail, userNumber, userPicture, password) 
                                            VALUES('{$name}','{$surname}','{$email}','{$number}','{$profilePic}','{$password}');");
                                    confirm($query);
                
                                    $_SESSION['emailOrNo'] = $emailOrNo;
                                    redirect("dashboard.php");
                                }
                
                            } else {
                                echo "Passwords do not match, please try again.";
                            }
                        } else {
                            echo "Phone number or email not valid";
                        }
                
                    } else {
                        echo "Name and Surname should not be longer than 15 charachers!";
                    }
                }
            } else {
                echo "Name and Surname has to be string!";
            }

        }
    }   




    //===============================================================
    //===============================================================
    //===============================================================
    //-------------------------Dashboard-----------------------------
    //===============================================================
    //===============================================================
    //===============================================================
    function get_Page_Name(){
        if(isset($_GET['orders'])){
            echo "Orders";
        } else if(isset($_GET['listProduct'])){
            echo "List Product";
        } else if(isset($_GET['listBrand'])){
            echo "List Brand";
        } else {
            echo "Account";
        }
    }

    function updateProfile(){
        if(isset($_POST['updateProfile'])){
            $profile_query = query("SELECT * FROM users_tbl");
            confirm($profile_query);

            $userEmailOrNum = $_SESSION['emailOrNo'];

            while ($row = mysqli_fetch_array($profile_query)){
                $firstName = escape_string($_POST['firstName']);
                $lastName = escape_string($_POST['lastName']);

                $profilePic = escape_string("resources/Uploads/Profile/" . $_FILES['profilePic']['name']);
                $profile_temp = escape_string($_FILES['profilePic']['tmp_name']);

                if (!empty($firstName) && !empty($lastName)) {
                    
                    if ($firstName != $row['userName']) {
                        $query = query("UPDATE users_tbl SET userName = '$firstName' WHERE '$userEmailOrNum' = userEmail OR '$userEmailOrNum' = userNumber; ");
                        confirm($query);
                    } 

                    if ($lastName != $row['userSurname']) {
                        $query = query("UPDATE users_tbl SET userSurname = '$lastName' WHERE '$userEmailOrNum' = userEmail OR '$userEmailOrNum' = userNumber; ");
                        confirm($query);
                    }

                    if ($_FILES['profilePic']['name']) {
                        copy($profile_temp, $profilePic);
                        $query = query("UPDATE users_tbl SET userPicture = '$profilePic' WHERE '$userEmailOrNum' = userEmail OR '$userEmailOrNum' = userNumber; ");
                        confirm($query);
                    }
                } else {
                    echo("Error: Fields Cannot Be Empty!");
                    
                }
            }

        }
    }

    function changePassword(){
        if(isset($_POST['updatePassword'])){
            $currentPassword = escape_string($_POST['currentPassword']);
            $newPassword = escape_string($_POST['newPassword']);
            $confirmNewPassword = escape_string($_POST['confirmNewPassword']);

            $emailOrNo = $_SESSION['emailOrNo'];

            $query = query("SELECT * FROM users_tbl WHERE userEmail = '{$emailOrNo}' OR userNumber = '{$emailOrNo}' LIMIT 1;");
            confirm($query);
            if ($currentPassword &&  $newPassword &&  $confirmNewPassword) {
                if (strlen($newPassword > 3)) {
                    while ($row = mysqli_fetch_array($query)){
                        if (password_verify($currentPassword, $row['password'])) {
                            if ($newPassword == $confirmNewPassword) {
                                $newPassword = password_hash($newPassword, PASSWORD_BCRYPT, array('cost'=>12));
                                $updateQuery = query("UPDATE users_tbl SET password = '$newPassword' WHERE '$emailOrNo' = userEmail OR '$emailOrNo' = userNumber; ");
                                confirm($updateQuery);
                                echo "Success: Password has been changed!";
                            } else {
                                echo("Error: Passwords Do Not match!");
                            }
                        } else {
                            echo("Error: Password Incorrect!");
                        }
                    }
                } else {
                    echo "Passsword is too short!";
                }
               
            } else {
                echo("Warning: Please Fill-In All Fields!");
            }

        }
    }

    function show_all_orders(){

        $userEmailOrNum = $_SESSION['emailOrNo'];
        $userIdQuery = query("SELECT userId FROM users_tbl WHERE '{$userEmailOrNum}' = userEmail OR '{$userEmailOrNum}' = userNumber;");
        confirm($userIdQuery);
        while ($row = mysqli_fetch_array($userIdQuery)){
            $query = query("SELECT * FROM `order_tbl` OT LEFT OUTER JOIN `item_tbl` IT ON OT.itemId = IT.itemId WHERE `userId` = '" . $row['userId'] . "';");
            confirm($query);
            
            while ($row = mysqli_fetch_array($query)) {
                $itemPic = display_image($row['itemPicture']);
                $displayBrands = <<<LIMIT
                    <tr>
                        <td>{$row['orderId']}</td>
                        <td><img src="{$row['itemPicture']}" width="200" alt="Brands Logo"></td>
                        <td>{$row['itemName']}</td>
                        <td>{$row['orderQuantity']}</td>
                        <td>{$row['orderPrice']}</td>
                        <td><a href="resources/templates/back/deleteOrder.php?id={$row['orderId']}">Delete</a></td>
                    </tr>
                LIMIT;

                echo $displayBrands;
            }
        }

    }

    function add_product(){
        if (isset($_POST['addProduct'])) {
            $productName = escape_string($_POST['productName']);
            $productPrice = escape_string($_POST['productPrice']);
            $productQuantity = escape_string($_POST['productQuantity']);
            $productDesc = escape_string($_POST['productDesc']);

            $productPic = escape_string("resources/Uploads/Products/" . $_FILES['productPic']['name']);
            $image_temp_location = escape_string($_FILES['productPic']['tmp_name']);

            if (!empty($productName) && !empty($productPrice) && !empty($productQuantity) && !empty($productDesc) && !empty($productPic)) {
              if (!is_numeric($productName) && !is_numeric($productDesc)) {
                  if (is_numeric($productPrice) && is_numeric($productQuantity)) {
                    //move_uploaded_file() didn't  work, so I tried copy() and it worked.
                    copy($image_temp_location, $productPic);

                    $query = query("INSERT INTO item_tbl (itemName, itemDescription, itemPrice, itemQuantity, itemPicture)
                    VALUES ('{$productName}', '{$productDesc}', '{$productPrice}', '{$productQuantity}', '{$productPic}');");

                    confirm($query);
                    set_alert_message("Success: ", "Product added!", true);
                } else {
                    echo "The Product price and quantity shoult be datatype: Number";
                }
                   
              } else {
                echo "The Product name and description shoult be datatype: String";
              }
                
            } else {
                echo "Make sure to fill-in all fields.";
            }

        }
    }

    function show_all_products(){
        $query = query("SELECT * FROM item_tbl;");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $displayProducts = <<<LIMIT
                <tr>
                    <td>{$row['itemId']}</td>
                    <td><img src="{$row['itemPicture']}" width="200" alt="Product Image"></td>
                    <td>{$row['itemName']}</td>
                    <td>{$row['itemDescription']}</td>
                    <td>{$row['itemPrice']}</td>
                    <td>{$row['itemQuantity']}</td>
                    <td><a href="resources/templates/back/deleteProduct.php?id={$row['itemId']}">Delete</a></td>
                </tr>
            LIMIT;

            echo $displayProducts;
        }
    }

    //===============================================================
    //===============================================================
    //===============================================================
    //---------------------------Index-------------------------------
    //===============================================================
    //===============================================================
    //===============================================================

    function show_featured_product(){
        $query = query("SELECT * FROM item_tbl LIMIT 6");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $oldPrice = $row['itemPrice'] + 15;
            $displayProduct = <<<LIMIT
                <div class="product-item">
                    <div class="product-item-image">
                        <a href="product-details.php?id={$row['itemId']}"><img src="{$row['itemPicture']}" alt="Product Name" class="img-fluid"></a>
                        <div class="cart-icon">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75" viewBox="0 0 16.75 16.75">
                                    <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                        <g id="Icon" transform="translate(0 1)">
                                            <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                fill="none" stroke="#1a2224" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5" />
                                            <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                fill="none" stroke="#1a2224" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5" />
                                            <path id="Path_3" data-name="Path 3"
                                                d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="product-item-info">
                        <a href="product-details.html">{$row['itemName']}</a>
                        <span>$&#8203;{$row['itemPrice']}</span> <del>$&#8203;{$oldPrice}</del>
                    </div>
                </div>
            LIMIT;

            echo $displayProduct;
        }
    }

    function show_new_product(){
        $query = query("SELECT * FROM item_tbl ORDER BY itemId DESC LIMIT 6;");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $oldPrice = $row['itemPrice'] + 15;
            $displayProduct = <<<LIMIT
                    <div class="col-md-4 col-sm-6">
                    <div class="product-item">
                        <div class="product-item-image">
                            <a href="product-details.php?id={$row['itemId']}"><img src="{$row['itemPicture']}" alt="Product Name"
                                    class="img-fluid"></a>
                            <div class="cart-icon">
                                <a href="#"><i class="far fa-heart"></i></a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                        viewBox="0 0 16.75 16.75">
                                        <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                            <g id="Icon" transform="translate(0 1)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                    transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="product-item-info">
                            <a href="product-details.html">{$row['itemName']}</a>
                            <span>$&#8203;{$row['itemPrice']}</span> <del>$&#8203;{$oldPrice}</del>
                        </div>
                    </div>
                </div>
            LIMIT;

            echo $displayProduct;
        }
    }

    //===============================================================
    //===============================================================
    //===============================================================
    //----------------------------Shop-------------------------------
    //===============================================================
    //===============================================================
    //===============================================================

    function show_product_in_shop(){
        $query = query("SELECT * FROM item_tbl");
        confirm($query);

        while ($row = mysqli_fetch_array($query)) {
            $oldPrice = $row['itemPrice'] + 15;
            $displayProduct = <<<LIMIT
                <div class="col-md-4 col-sm-6">
                    <div class="product-item">
                        <div class="product-item-image">
                            <a href="product-details.php?id={$row['itemId']}"><img src="{$row['itemPicture']}" alt="Product Name"
                                    class="img-fluid"></a>
                            <div class="cart-icon">
                                <a href="#"><i class="far fa-heart"></i></a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                        viewBox="0 0 16.75 16.75">
                                        <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                            <g id="Icon" transform="translate(0 1)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                    transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="product-item-info">
                            <a href="product-details.php?id={$row['itemId']}">{$row['itemName']}</a>
                            <span>$&#8203;{$row['itemPrice']}</span> <del>$&#8203;{$oldPrice}</del>
                        </div>
                    </div>
                </div>
            LIMIT;

            echo $displayProduct;
        }
    }

    //===============================================================
    //===============================================================
    //===============================================================
    //---------------------------Product-----------------------------
    //===============================================================
    //===============================================================
    //===============================================================

    function order_product(){
        if (isset($_POST['orderProduct'])) {
            $id = $_GET['id'];
            $productQty = query("SELECT * FROM `item_tbl` WHERE itemId = {$id};");
            $row = mysqli_fetch_array($productQty);

            
            if ($row['itemQuantity'] != "0") {
                $userEmailOrNum = $_SESSION['emailOrNo'];
                $getUserQuery = query("SELECT `userId` FROM `users_tbl` WHERE '{$userEmailOrNum}' = `userEmail` OR '{$userEmailOrNum}' = `userNumber`;");        
                confirm($getUserQuery);

                while ($row = mysqli_fetch_array($getUserQuery)) {
                    $getUser = $row['userId'];
                }

                $getProductPriceQuery = query("SELECT `itemPrice` FROM `item_tbl` WHERE itemId = " . $id . ";");
                confirm($getProductPriceQuery);

                while ($row = mysqli_fetch_array($getProductPriceQuery)) {
                    $getProductPrice = $row['itemPrice'];
                }
            
                $query = query("INSERT INTO `order_tbl` (userId, itemId, OrderPrice, OrderQuantity) VALUES({$getUser}, {$id}, {$getProductPrice}, 1)");
                confirm($query);

                set_message("Producted Ordered!");

                $updateItemQuantityQuery = query("UPDATE `item_tbl` SET `itemQuantity` = (itemQuantity-1) WHERE itemId = " . $id . ";");
                confirm($updateItemQuantityQuery);
                
            } else {
                echo "<h6 class='bg-danger text-center pd-2'>Unfortunatly, we are out of stock at the moment!</h6>";
            }

        }
    }
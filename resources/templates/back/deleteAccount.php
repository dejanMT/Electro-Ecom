<?php
    require_once("../../config.php"); 
    
    $userEmailOrNum = $_SESSION['emailOrNo'];
    $userIdQuery = query("SELECT userId FROM users_tbl WHERE '{$userEmailOrNum}' = userEmail OR '{$userEmailOrNum}' = userNumber;");
    confirm($userIdQuery);
    while ($row = mysqli_fetch_array($userIdQuery)){

        $getItemIdQuery = query("SELECT `itemId` FROM `order_tbl` WHERE `userId` = '" . $row['userId'] . "';");
        confirm($getItemIdQuery);
        while ($row = mysqli_fetch_array($userIdQuery)){
            $query = query("UPDATE `item_tbl` SET `itemQuantity` = (itemQuantity + 1) WHERE itemId = '" . $row['itemId'] . "';");
            confirm($query);  
        }  

        //Delete statement
        $query= query("DELETE FROM `users_tbl` WHERE `userId` = '" . $row['userId'] . "';");
        confirm($query);

        set_alert_message("Success: ", "Account Deleted!", true);

        session_start();
        session_destroy();
        redirect("../../../index.php");
    }
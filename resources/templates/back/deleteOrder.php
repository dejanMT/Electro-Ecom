<?php
    require_once("../../config.php");    
    

    if(isset($_GET['id'])){

        //Since order is deleted add one to the item quantity
        $query = query("UPDATE `item_tbl` SET `itemQuantity` = (`itemQuantity` + 1) WHERE itemID = '" . $_GET['id'] . "';");
        confirm($query);
        
        //Delete statement
        $query= query("DELETE FROM `order_tbl` WHERE `orderId` = " . escape_string($_GET['id']) . ";");
        confirm($query);

        set_alert_message("Success: ", "Order Deleted!", true);
        redirect("../../../dashboard.php?orders");
    } else {
        set_alert_message("Error: ", "Order unable to be deleted, try again later.", false);
        redirect("../../../dashboard.php?orders");
    }
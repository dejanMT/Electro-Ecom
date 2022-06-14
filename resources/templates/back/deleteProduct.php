<?php
    require_once("../../config.php");    
    

    if(isset($_GET['id'])){
        
        //Delete statement
        $query= query("DELETE FROM item_tbl WHERE itemId = " . escape_string($_GET['id']) . ";");
        confirm($query);

        set_alert_message("Success: ", "Product Deleted!", true);
        redirect("../../../dashboard.php?listProduct");
    } else {
        set_alert_message("Error: ", "Product unable to be deleted, try again later.", false);
        redirect("../../../dashboard.php?listProduct");
    }
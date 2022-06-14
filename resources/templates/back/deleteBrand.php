<?php
    require_once("../../config.php");    
    

    if(isset($_GET['id'])){
        
        //Delete statement
        $query= query("DELETE FROM brand_tbl WHERE brandId = " . escape_string($_GET['id']) . ";");
        confirm($query);

        set_alert_message("Success: ", "Brand Deleted!", true);
        redirect("../../../dashboard.php?listBrand");
    } else {
        set_alert_message("Error: ", "Brand unable to be deleted, try again later.", false);
        redirect("../../../dashboard.php?listBrand");
    }
<?php require_once("resources/config.php"); ?>
<?php include("resources/templates/header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Page</title>
</head>
<body>
    <!-- Show Brand Table Start -->
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Brand Description</th>
            <th>Brand Logo</th>
        </tr>
        
        <?php show_all_brands(); ?>
    </table>
    <!-- Show Brand Table End -->

<!-- Footer -->
<?php include("resources/templates/footer.php"); ?>
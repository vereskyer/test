<?php
    // create short variable names
    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bob's Auto Parts - Order Results</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Customer Orders</h2>
        <?php
            $orders = file("$document_root/../orders/orders.txt");

            $numbers_of_orders = count($orders);
            if ($numbers_of_orders == 0){
                echo "<p><strong>No orders pending.<br />
                        Please try again later.</strong></p>";
                    }
            for ($i=0; $i<$numbers_of_orders; $i++){
                echo $orders[$i]."<br />";            
            }
        ?>
    </body>
</html>
<?php
    // create short variable names
    date_default_timezone_set("Asia/Seoul");  //date函数设置本地时间
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $tireqty = (int) $_POST['tireqty'];
    $oilqty = (int) $_POST['oilqty'];
    $sparkqty = (int) $_POST['sparkqty'];
    $address = preg_replace('/\t|\R/',' ',$_POST['address']);
    $date = date('H:i, jS F Y');
    $find = $_POST['find'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bob's Auto Parts - Order Results</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <?php 
            
            echo "<p>Order processed at ".$date."</p>";

            $totalqty = 0;
            $totalamount = 0.00;

            //声明和使用常量
            define('TIREPRICE', 100);
            define('OILPRICE', 10);
            define('SPARKPRICE', 4);



            $totalqty = $tireqty + $oilqty + $sparkqty;
            echo "<p>Items ordered: ".$totalqty."<br />";

            if ($totalqty == 0){
                echo "You did not order anything on the previous page!<br />";
            }else{
                if ($totalqty == 0){
                    echo "You did not erder anything on the previous page!<br />";
                }else{
                    if ($tireqty > 0){
                        echo htmlspecialchars($tireqty).' tires<br />';
                    }
                    if ($oilqty > 0){
                        echo htmlspecialchars($oilqty).' bottles of oil<br />';
                    }
                    if ($sparkqty > 0){
                        echo htmlspecialchars($sparkqty).' spark plugs<br />';
                    }
                }
            }


            $totalamount = $tireqty * TIREPRICE
                        + $oilqty * OILPRICE
                        + $sparkqty * SPARKPRICE;

            echo "Subtotal: $".number_format($totalamount, 2)."<br />";

            $taxrate = 0.10; //local sales tax is 10%
            $totalamount = $totalamount * (1 + $taxrate);
            echo "Total including tax: $".number_format($totalamount,2)."</p>";
            echo "<p>Address to ship to is ".htmlspecialchars($address)."</p>";

            //难点，多看几遍
            $outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
                            .$sparkqty." spark plugs\t\$".$totalamount
                            ."\t".$address."\n";
            

            //调查客户从哪里得知我们
            echo "<p>How customer found us: ";
            if ($find=="a"){
                echo "crayong童装商场.</p>";
            }elseif($find=="b"){
                echo "paint town童装商场.</p>";
            }elseif($find=="c"){
                echo "Line童装商场.</p>";
            }elseif($find=="d"){
                echo "porky童装商场.</p>";
            }else{
                echo "We do not know how this customer found us.</p>";
            }
            
            // open file for appending
            $fp = fopen("$document_root\\..\\orders\\orders.txt", 'ab');

            if (!$fp){
                echo "<p><strong>Your order could not be processed at this time. "."Pleasse try again 
                    later.</strong></p>";
                exit;
            }

            flock($fp, LOCK_EX);
                fwrite($fp, $outputstring, strlen($outputstring));
                flock($fp, LOCK_UN);
                fclose($fp);
                echo "<p>Order written.</p>";
        ?>
    </body>
</html>

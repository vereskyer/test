<?php
    $products = array('Tires', 'Oil', 'Spark Plugs');

    //echo "$products[0] $products[1] $products[2]"

    //for 循环打印数组
    for ($i=0; $i<3; $i++){
        echo $products[$i]."<br />";
    }

    // foreach 访问数组
    foreach ($products as $current){
        echo $current."<br />";
    }

    $prices = array('Tires'=>100, 'Oil'=>10, 'Spark Plugs'=>4);
    // foreach 访问数组
    foreach ($prices as $key => $value){
        echo $key." - ".$value."<br />";
    }
    // 用each()结构列出$prices数组的内容
    while($element = each($prices)){
        echo $element['key']." - ".$element['value'];
        echo "<br />";
    }

    //一种更好的方式
    echo "<p>a better way</p>";
    reset($prices);
    while(list($product, $price) = each($prices)){
        echo $product." - ".$price."<br />";
    }
?>
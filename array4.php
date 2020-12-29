<?php
    $products = array('Tires', 'Oil', 'Spark Plugs');
    sort($products);

    for($i = 0; $i < 3; $i++){
        echo $products[$i].'<br />';
    }

    $prices = array(100, 10, 4);
    sort($prices);

    for ($i = 0; $i < 3; $i++){
        echo $prices[$i].'<br />';
    }

    $prices_with_products = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
    asort($prices_with_products);  // asort 函数给数组以数字重新排列
    foreach ($prices_with_products as $key => $value){
        echo $key." - ".$value."<br />";
    }

    reset($prices_with_products);
    ksort($prices_with_products);  // ksort 函数给数组以英文字母重新排列
    foreach ($prices_with_products as $key => $value){
        echo $key." - ".$value.'<br />';
    }

    echo "produts tw dimension<br />";
    $products_two_dimension = array(array('TIR', 'Tires', 100),
                                    array('OIL', 'Oil', 10),
                                    array('SPK', 'Spark Plugs', 4));

    array_multisort($products_two_dimension);
    for ($row = 0; $row < 3; $row++){
        for ($column = 0; $column < 3; $column++){
            echo $products_two_dimension[$row][$column].',';
        }
        echo '<br />';
    }

    echo "<p>逆序数组内容</p>";
    $numbers = range(1, 10);
    $numbers = array_reverse($numbers);

    for ($i=0; $i<10; $i++){
        echo $numbers[$i].'<br />';
    }

?>
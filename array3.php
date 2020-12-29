<?php
    //echo "<p>创建列名称来代替梳子索引</p>";
    $products = array(array('Code' => 'TIR',
                            'Description' => 'Tire',
                            'Price' => 100),
                      array('Code' => 'OIL',
                            'Description' => 'Oil',
                            'Price' => 10),
                      array('Code' => 'SPK',
                            'Description' => 'Spark Plugs',
                            'Price' => 4)
);

    echo "<p>用for循环遍历数组</p>";

    for ($row = 0; $row < 3; $row++){
        echo '|'.$products[$row]['Code'].'|'.$products[$row]['Description'].'|'
        .$products[$row]['Price'].'|<br />';
    }

    echo "<p>三维数组的示例</p>";
    $categories = array(array(array('CAR_TIR', 'Tires', 100),
                            array('CAR_OIL', 'Oil', 100),
                            array('CAR_SPK', 'Spark Plugs', 4)
                           ),
                      array(array('VAN_TIR', 'Tires', 120),
                            array('VAN_OIL', 'oil', 12),
                            array('VAN_SPK', 'Spark Plugs', 5)
                          ),
                      array(array('TRK_TIR', 'Tires', 150),
                            array('TRK_OIL', 'Oil', 15),
                            array('TRK_SPK', 'Spark Plugs', 6)
                          )
                    );

    for ($layer = 0; $layer < 3; $layer++){
        echo 'Layer'.$layer."<br />";
        for ($row = 0; $row < 3; $row++){
            for ($column = 0; $column < 3; $column++){
                echo '|'.$categories[$layer][$row][$column];
            }
            echo '<br />';
        }
    }
?>
<?php

function benchmark($name, $iterations, $action){
    $time=microtime(true);
    for($i=0;$i<=$iterations;++$i){
        $action();
    }
    echo $name . ' ' . round(microtime(true)-$time, 6) . "\n";
}

$iterations = 100000;
$x = array();
$actions = array(
    "Empty empty()" => function() use($x){
        empty($x);
    },
    "Empty count()" => function() use($x){
        isset($x[0]);
    },
   
);

foreach($actions as $name => $action){
    benchmark($name, $iterations, $action);
}

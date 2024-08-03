<?php

session_start();
echo "<h3> PHP List All Session Variables</h3>";
foreach ($_SESSION as $key => $val)
    if (gettype($val) == 'array') {
        echo $key . " " . implode($val) . "<br/>";
    } else {
        echo $key . " " . $val . "<br/>";
    }
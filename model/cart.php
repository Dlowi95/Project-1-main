<?php

function load_cart(){
    $sql = "SELECT * FROM cart ";
    return get_all($sql);
}
?>
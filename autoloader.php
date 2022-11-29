<?php

function myAutoloder() {
    spl_autoload_register(function ($name) {
        include $name . '.php';
    });
    
}

?>

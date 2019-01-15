<?php

class AppController
{
    public function home()
    {
        echo "Page index bro";
        require_once("../Views/Articles/index.php");
    }
}

?>
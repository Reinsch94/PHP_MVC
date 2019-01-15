<?php

require_once('../Config/core.php');

class router
{
    function parse()
    {
        //$path=URL
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $params = explode('/', $path);   
        array_shift($params);

        if($params == null)
        {
            $params[0]="Errors";
            $params[1]="notFound";
        }
        else if(count($params)<2)
        {
            $params[0] = "Errors";
            $params[1] = "notFound";
        }

        $arg = [];
        array_push($params, $arg);

        return $params;
    }
    
}
 ?>
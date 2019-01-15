<?php

require_once('../Config/core.php');

class Router_false
{
    function __construct(){
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $params = explode('/', $path);
        if($params[0]===NULL)
        {
            require_once('../Webroot/index.php');
        
        }
        else
        {
            array_shift($params);
        }            
        $rules = array
        (
            '{Articles}'=>'ArticlesController@bitch',
            '{Users}' => 'UsersController@show'
        );
        $found = false;
        foreach($rules as $pattern => $target) {
            if(preg_match($pattern, $path, $params)) 
            {
                $exploded = explode('@', $target);
                $controller = new $exploded[0]();
                // var_dump($controller);
                $fun = $exploded[1];
                $controller->$fun();
                $found = true;
                break;
            }
        }
        if (!$found) {
            header('HTTP/1.1 404 Not Found');
            echo "404 NOT FOUND (enculé)";
            // require_once('../Controllers/404Controller.php');
        }
    }

}
?>
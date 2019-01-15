<?php 

class Dispatcher
{
    function dispatch($params)
    {   
        $controller = $params[0];
        $method = $params[1];
        $id = $params[2];


        $controller= $params[0]."Controller"; //= Concat avec params[0] soit ex=ArticleController
        $error = false;
        if(class_exists($controller))
        {
            $ctrl= new $controller();
            if(method_exists($controller,$method))
            {
                $ctrl -> $method($id);
            }
            else
            {
                $error = true;
            }
        }
        else 
        {
            $error=true;
        }
        if($error)
        {
            require_once("Views/Error/notFound.php");
        }
    }
}
?>

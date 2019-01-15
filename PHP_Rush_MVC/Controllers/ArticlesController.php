<?php
require("../Models/Articles.php");
class ArticlesController extends Articles
{
    function delete($id)
    {
        $Article1 = new Articles();
        $article = $Article1->get_article($id);
        if(isset ($article['id']))
        {
            $del = $Article1->erase($id); 
            include_once("../Views/Articles/delete.php");
        }
        else
        {
            header('Location: /PHP_Rush_MVC/Articles/home');
        }
    }
    function update($id)
    {
        $Article1 = new Articles();
        $article = $Article1->get_article($id);
        include_once("../Views/Articles/update.php");
        if(!empty($_POST))
        {
            extract($_POST);
            $del = $Article1->edit($id,$title,$content,$category_id);
            header('Location: /PHP_Rush_MVC/Articles/home');
        }
        return $article;  
    }
    function show($id)
    {
        $article = new Articles();
        $show = $article->get_article($id);
        include_once("../Views/Articles/show.php");
        return $show;

    }
    function home()
    {
        $Articles = new Articles();
        $Article1 = $Articles->get_articles();
        include_once("../Views/Articles/home.php");
        return $Article1;
    }
  
    function create()
    {
        $flag = false;
        extract($_POST);
        
        if(isset($title) && isset($content) && isset($category_id) /*&& isset($_POST['id'])*/)
        {
            
            $flag=true;
            if(strlen($title) <= 2)
            {
                $flag=false;
                echo "Sorry bro, ton titre doit être dee minimum 4 caractères.<br>";
                
            }
            if(strlen($content) <= 2)
            {
                $flag=false;
                echo "Sorry bro, ton article doit être de minimum 10 caractères.";
                
            }
            if(empty($category_id))
            {
                $flag=false;
                echo "bro, une catégorie est obligatoire bitch";
            }
            if($flag=true)
            {
                $Articles = new Articles();

                $verif_title=$this->secure_input($title);
                $verif_content=$this->secure_input($content);

            $Articles->createArticles($verif_title,$verif_content,$category_id);
                header('Location: /PHP_Rush_MVC/Articles/home');
                return true;
            }
        }      
        include_once("../Views/Articles/create.php");
    }


    function secure_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
        return $data;
    }
}
?>
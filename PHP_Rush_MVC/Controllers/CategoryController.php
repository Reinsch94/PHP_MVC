<?php
require("../Models/Category.php");
class CategoryController extends Category
{
   function show($id)
    {
        $article = new Categroy();
        $show = $article->get_category($id);
        include_once("../Views/Articles/sw.php");
        return $show;
    }
    function homecat()
    {
        $Category = new Category();
        $Category1 = $Category->get_categories();
        include_once("../Views/Articles/create.php");
        return $Category1;
    }
    function update()
    {
        $Category = new Category();
        $Category1 = $Category->get_categories();
        include_once("../Views/Articles/update.php");
        return $Category1;
    }
























}

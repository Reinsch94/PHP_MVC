<?php 
require_once("../Config/db.php");

class Category
{
    function get_categories()
    {
        $bdd = Database::getbdd();
        $sql="SELECT *
              FROM blog.categories";
        $stmt=$bdd->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    function get_category($id)    
    {
        $bdd = Database::getbdd();
        $sql="SELECT*
              FROM blog.category
              WHERE id = :id";
        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute(); 
        $result=$stmt->fetch(); 
        return $result;
    }
    function createCategory($name)
    {
        $bdd = Database::getbdd();
        // $user_id=$_POST['id'];
        $sql="INSERT INTO blog.articles(name) 
              VALUES(:name)";

        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":title",$name);
        return $result;
    }
    function edit($id,$name)
    {
        $bdd = Database::getbdd();
        $sql="UPDATE blog.articles
              SET name = :name
              WHERE id = :id";
        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":id",$id);
        $result=$stmt->execute();
        return $result;
    }







}


<?php
require_once("../Config/db.php");
class Articles{

    function get_articles()
    {
        $bdd = Database::getbdd();
        $sql = "SELECT * 
                FROM blog.articles";
        $stmt=$bdd->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    function get_article($id)    
    {
        $bdd = Database::getbdd();
        $sql="SELECT*
              FROM articles
              WHERE id = '".$id."' ";
        $stmt=$bdd->prepare($sql);
        $stmt->execute(); 
        $result=$stmt->fetch(); 
        return $result;
    }
    function createArticles($title,$content,$category_id)
    {
        $bdd = Database::getbdd();
        // $user_id=$_POST['id'];
        $sql="INSERT INTO blog.articles(title,content,category_id) 
              VALUES(:title, :content,:category_id)";

        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":category_id",$category_id);
        // $stmt->bindParam(":user_id",$user_id);
        // $stmt->bindParam(":image",$image);
        $result=$stmt->execute();
        return $result;
    }
    function edit($id,$title,$content)
    {
        $bdd = Database::getbdd();
        $sql="UPDATE blog.articles
              SET title = :title,content = :content
              WHERE id = :id";
        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":id",$id);
        $result=$stmt->execute();
        return $result;
    }
    function erase($id)
    {
        $bdd = Database::getbdd();
        $sql="DELETE FROM blog.articles
              WHERE id = :id";
        $stmt=$bdd->prepare($sql);
        $stmt->bindParam(":id",$id);
        $result=$stmt->execute();
    }
}
?>
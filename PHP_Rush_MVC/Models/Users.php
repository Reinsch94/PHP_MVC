<?php

require("Model.php");
require_once("../Config/db.php");


class Users
{

    public function get_users(){

        $bdd = Database::getbdd();
        $sql = "SELECT * from Users";
        $stmt = $bdd ->prepare($sql);
        $stmt -> execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_user($id){

        $bdd = Database::getbdd();
        $sql = "SELECT * from Users
        WHERE id = '".$id."' ";

        $stmt = $bdd ->prepare($sql);
        $stmt -> execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_user_mail($email){

        $bdd = Database::getbdd();
        $sql = "SELECT * from Users
        WHERE email = '".$email."' ";

        $stmt = $bdd ->prepare($sql);
        $stmt -> execute();
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function create_user($username, $password, $email, $group = 0, $status=0)
    {
        $bdd = Database::getbdd();

        $hashpswd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users(username, hassh_password, email, creation_date, modification_date, group_name, status) 
        VALUES ('".$username."','".$hashpswd."','".$email."', NOW(), NOW(), '".$group."', '".$status."') ";
        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute();

        return $result;
    }

    function update_user($id, $username, $password, $email, $group, $status)
    {
        $bdd = Database::getbdd();

        $hashpswd = password_hash($password, PASSWORD_DEFAULT);

        $sql ="UPDATE Users
        SET username = '".$username."', hassh_password = '".$hashpswd."', email = '".$email."', modification_date = NOW(), group_name = '".$group."', status = '".$status."'
        WHERE id = '".$id."' ";

        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute();

        return $result;
    }

    function delete_user($id)
    {
        $bdd = Database::getbdd();
        $sql = "DELETE FROM Users
		WHERE id = '".$id."' ";

		$stmt = $bdd->prepare($sql);
		$stmt -> execute();

    }

    function ban($id)
    {
        $bdd = Database::getbdd();
        $sql = "UPDATE Users
        SET status = 1
		WHERE id = '".$id."' ";

		$stmt = $bdd->prepare($sql);
		$stmt -> execute();

    }

    function unban($id)
    {
        $bdd = Database::getbdd();
        $sql = "UPDATE Users
        SET status = 0
		WHERE id = '".$id."' ";

		$stmt = $bdd->prepare($sql);
		$stmt -> execute();
    }


}

?>
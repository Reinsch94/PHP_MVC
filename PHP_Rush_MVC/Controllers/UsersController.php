<?php

require("../Models/Users.php");

class UsersController extends Users{

    function show_all() {
        $show = new Users();
        $show1 = $show->get_users();

        // INSERT INTO Users(username, hassh_password, email, creation_date, modification_date, group_name, status) VALUES ("Alex", "zzzzz", "alex@moi.fr", NOW(), NOW(), "1", "1");

        include_once("../Views/Users/home.php");

        return $show1;
    }

    function show($id)
    {
        $show = new Users();
        $show2 = $show->get_user($id);
        include_once("../Views/Users/show.php");

        return $show2;
    }

    function delete($id){


        $delete = new Users();

        $task = $delete->get_user($id);

      

        if(isset($task['id']))
        {
            $delete1 = $delete->delete_user($id);
            include_once("../Views/Users/delete.php");

        }
        else
        {
            header('Location: /PHP_Rush_MVC/Users/show_all');

        }

    }

    public function add_user()
    {
        $flag = false;
        include_once("../Views/Users/create.php");

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_conf']))
        {
            extract($_POST);
            $flag = true;

            if ($password != $password_conf && $password != null)
            {
                $flag = false;
                echo "Invalid password confirmation.\n";
            }
            if (strlen($username)<3 && strlen($username) >=10)
            {
                $flag = false;
                echo "Invalid username";
            }
            if (strlen($password)<8 && strlen($password) >=20)
            {
                $flag = false;
                echo "Invalid password";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)  && $email != null)
            {
                $flag = false;
                echo "Invalid email";
            }
            if ($flag == true)
            {
                $add = new Users();

                $verif_username = $this->secure_input($username);
                $verif_email = $this->secure_input($email);
        
                $addusr = $add->create_user($verif_username, $password, $verif_email);
                
                header('Location: /PHP_Rush_MVC/Webroot');
                return true;
            }


        }


    }

    public function add_user_admin()
    {
        $flag = false;
        include_once("../Views/Users/create_admin.php");

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_conf']) && isset($_POST['group']))
        {
            extract($_POST);
            $flag = true;

            if ($password != $password_conf && $password != null)
            {
                $flag = false;
                echo "Invalid password confirmation.\n";
            }
            if (strlen($username)<3 && strlen($username) >=10)
            {
                $flag = false;
                echo "Invalid username";
            }
            if (strlen($password)<8 && strlen($password) >=20)
            {
                $flag = false;
                echo "Invalid password";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)  && $email != null)
            {
                $flag = false;
                echo "Invalid email";
            }
            if ($flag == true)
            {
                $add = new Users();

                $verif_username = $this->secure_input($username);
                $verif_email = $this->secure_input($email);
        
                $addusr = $add->create_user($verif_username, $password, $verif_email, $group);
                
                header('Location: /PHP_Rush_MVC/Users/show_all');
            }


        }


    }

    function login ()
    {
        $flag = false;
        include_once("../Views/Users/login.php");

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
        {
            extract($_POST);

            $con = new Users();

            $login = $con->get_user_mail($email);
            if($login)
            {
                if(password_verify($password, $login->hassh_password))
                {
                    $_SESSION['username']=$login->username;
                    $_SESSION['email']=$login->email;
                    $_SESSION['group_name']=$login->group_name;
                    $_SESSION['status']=$login->status;
                    $_SESSION['log']=true;

                    if (isset($_POST["remember_me"]))
                    {
                        setcookie('email',$_SESSION['email'],time()+36000);
                        setcookie('username' , $_SESSION['username'], time()+36000);
                        setcookie('group_name', $_SESSION['group_name'], time()+36000);
                        setcookie('status', $_SESSION['status'], time()+36000);
                        echo "cookies set";
                    }
                    echo "loged in !";
                    // header('Location : index.php');
                }
                else
                {
                    echo "Incorrect password !";
                }
            }
            else
            {
                echo "Username ou password incorrect bruh !";
            }
        }
    }

    function logout()
    {
        include_once("../Views/Users/logout.php");

        
        session_start();
        session_unset();
        session_destroy();
        setcookie('email',$_SESSION['email'],time()-1);
        setcookie('username' , $_SESSION['username'], time()-1);
        setcookie('group_name', $_SESSION['id'], time()-1);
        setcookie('status', $_SESSION['status'], time()-1);

        header('Location : /PHP_Rush_MVC/Users/login');
        
    }

    function update($id)
    {
        $flag = false;

        $updt = new Users();
        $task = $updt->get_user($id);

        include_once("../Views/Users/update.php");

        if (!empty($_POST))
        {
            extract($_POST);
            $flag = true;
            // var_dump($_POST);
            if ($password != $password_conf && $password != null)
            {
                $flag = false;
                echo "Invalid password confirmation.\n";
            }
            if (strlen($username)<3 && strlen($username) >=10)
            {
                $flag = false;
                echo "Invalid username";
            }
            if (strlen($password)<8 && strlen($password) >=20)
            {
                $flag = false;
                echo "Invalid password";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)  && $email != null)
            {
                $flag = false;
                echo "Invalid email";
            }
            if ($flag == true)
            {

                $username = $this->secure_input($username);
                $email = $this->secure_input($email);
        
                $up = $updt->update_user($id, $username, $password, $email, $group, $status);

                header('Location: /PHP_Rush_MVC/Users/show_all');
            }


        }

        


    }

    function Ban($id)
    {
        $ban = new Users();

        $task = $ban->get_user($id);

        $ban1 = $ban->ban($id);

        include_once("../Views/Users/ban.php");
        header('Location: /PHP_Rush_MVC/Users/show_all');


    }

    function UnBan($id)
    {
        $unban = new Users();

        $task = $unban->get_user($id);

        $unban1 = $unban->ban($id);

        include_once("../Views/Users/unban.php");
        header('Location: /PHP_Rush_MVC/Users/show_all');


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
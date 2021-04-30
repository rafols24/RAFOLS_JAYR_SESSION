<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['submit']))
    {
       if(empty($_POST['username']) || empty($_POST['password']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from form where username='".$_POST['username']."' and password='".$_POST['password']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['username']=$_POST['username'];
                header("location:welcome.php");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo '';
    }

?>
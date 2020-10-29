<?php

if(isset($_POST['login-submit']))
{
    include 'dbh.php';
    $mainuid = $_POST['mailuid'];
    $password = $_POST['password'];
    
    if(empty($mainuid)||empty($password))
    {
        header("Location:index.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "select * from users where UserName=? or Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:index.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$mainuid,$mainuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {   
                
                if($password == $row['Password'])
                {
                    $pwdcheck = true;
                    session_start();
                    $_SESSION['username'] = $row['UserName'];
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['firstname']= $row['FirstName'];
                    echo $_SESSION['firstname'];
                    header("Location:login_index.php?login=success");
                    exit();
                }
                else
                {
                    $pwdcheck =false;
                    header("Location:login.php?error=wronguser");
                    exit();
                }
                
                echo $pwdcheck;
                 
          

                
                #$pwdcheck = password_verify($password,$row['Password']);
                #$pwdcheck = $r
               
            }
            else
            {
                header("Location:index.php?error=nouser");
                exit();
            }
        }
    }
 
}
else
{
   header("Location:index.php");
    exit();
}





?>
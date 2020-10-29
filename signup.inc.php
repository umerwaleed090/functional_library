<?php
include 'dbh.php';

if(isset($_POST['submit-search']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $telephone = $_POST['telephone'];
    $mobilenumber = $_POST['mnumber'];
    $email = $_POST['email'];
    $addressline1 = $_POST['addressline1'];
    $addressline2 = $_POST['addressline2'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    if(empty($firstname)||empty($lastname)||empty($username)||empty($mobilenumber)||empty($email)||empty($addressline1)||empty($addressline2)||empty($city)||empty($password)||empty($confirmpassword))
    {
        $message = "empty fields";
        header("Location: signup.php?error=emptyfields");
        exit();
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        echo"email and username error";
            header("Location: signup.php");
        exit();
        
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo"not correct email";
        header("Location: signup.php");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        echo"username nod correct";
        header("Location: signup.php");
        exit();
    }
    elseif($password != $confirmpassword)
    {
        echo "passwrod not same";
        header("Location: signup.php");
                exit();


        
    }
    else
    {
        $sql = "select UserName from users where UserName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            echo"Sql Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result_check = mysqli_stmt_num_rows($stmt);
            
            if($result_check > 0)
            {
                echo "username already taken";
            }
            else
            {
                $sql = "insert into users (FirstName,Surname,UserName,Telephone,MobileNumber,Email,AddressLine1,AddressLine2,City,Password) values(?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    echo"Sql Error";
                    exit();
                }
                else
                {
                    $hasedpwd = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sssiisssss",$firstname,$lastname,$username,$telephone,$mobilenumber,$email,$addressline1,$addressline2,$city,$password,);
                    mysqli_stmt_execute($stmt);
                    
                    echo"sighup successfull";
                    header("Location: index.php?error=emptyfields");

                    exit();
                 
                    
                }


            }
        }
    }
    #mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


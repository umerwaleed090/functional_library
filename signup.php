<?php
    include 'dbh.php';
 
    session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Umer's Library</title>
</head>

<body>
    <div class="page-wrap">
        <header>
           
            <div class="container">
               <div class="float_left">
               <p class="top_heading">Umer's Library</p>
               </div>
                <nav>
                    <ul>
                        <li><a href="index.php"><span>HOME</span></a></li>
                        <li><a href="Login.php"><span>LOGIN</span></a></li>
                        <li><a href="signup.php"><span>SIGNUP</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">

               

                <div class="wrap">
                   
                    <form action="signup.inc.php" method="POST" class="signup">
                        <h2>SignUp For Free</h2>
                        <?php
                if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                echo '<div style="padding: 20px; border-radius: 24px; margin-bottom: 30px; text-align:center; "><span style="font-family: Arial; font-size: 18px; color:red;">Pls enter all fields</span></div>';
                }
                }
                
                ?>
                        <input  type="text" name="firstname" placeholder="FirstName">
                        <input type="text" name="lastname" placeholder="LastName">
                        <input type="text" name="username" placeholder="UserName">
                        <input type="number" name="telephone" placeholder="telephone">
                        <input type="number" name="mnumber" placeholder="MobileNumber">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="addressline1" placeholder="AddressLine1">
                        <input type="text" name="addressline2" placeholder="AddressLine2">
                        <input type="text" name="city" placeholder="City">
                        <input type="password" name="password" placeholder="password">
                        <input type="password" name="confirmpassword" placeholder="Enter_Password_Again">
                        <br>
                        <br>
                        <input type="radio" name="male" value="male"><span class="signupradiobtn">Male</span>
                        <input type="radio" name="female" value="female"><span class="signupradiobtn">Female</span>
                        <br>
                        <br>
                        <input type="checkbox"><span class="signupradiobtn">Agree Terms and Conditions</span>
                        <br>
                         <button type="submit" name="submit-search">Submit</button>

                    </form>
                </div>
            </div>
        </main>
    </div>


    <footer>
        <div class="container">
            <p class="footer-left">&copy; Umer Waleed</p>
            <p class="footer-right">Call Me: 0899630455</p>
        </div>
    </footer>
</body>
</html>

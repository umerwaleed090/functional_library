<?php
    session_start();

    include 'dbh.php';

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
               <?php
                
                if(isset($_SESSION['username']))
                {
                    
                    echo '<form action="logout.inc.php" method="POST">
                   
                   
                   <button type="submit" name="logout-submit">Logout</button>
                   
                   </form>';
                    
                    echo'<nav>
                            <ul>
                                <li><a href="login_index.php"><span>HOME</span></a></li>
                                
                            </ul>
                        </nav>';
                   
                }
                else
                {
                   echo'<nav>
                            <ul>
                                <li><a href="index.php"><span>HOME</span></a></li>
                                <li><a href="Login.php"><span>LOGIN</span></a></li>
                                <li><a href="signup.php"><span>SIGNUP</span></a></li>
                            </ul>
                        </nav>';
                    
                }
                
                
            ?>
               
               
                
            </div>
        </header>
        <main>
            <div class="container">
               
                <?php
                
                if(isset($_SESSION['username']))
                {
                   echo'<h1>wellcome to your </h1>'; 
                   
                }
                else
                {
                   echo '<form action="login.inc.php" method="POST" class="login_box">
                    <h2>Login</h2>
                    <input class="login_input" type="text" name="mailuid" placeholder="UserName">
                    <input class="login_input" type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                    </form>';
                    
                }
                
                
            ?>
               
                
                
                
              
                
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

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
              
                <nav>
                    <ul>
                        <li><a href="login_index.php"><span>HOME</span></a></li>
                        <li><a href="viewreserve.php"><span>View</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">
              
        <?php
                
                
                
                if(isset($_POST['enter']))
                {
                    echo $_POST['enter'];
                    $isbn = $_POST['enter'];
                    $user = $_SESSION['username'];
                    $date = date("d-m-Y");

                    
                    $do = "update books set Reserved = 'Y' where ISBN = '$isbn'";
				    $insert = "insert into reservations values ('$isbn','$user', $date)";
				    mysqli_query($conn, $do);
				    mysqli_query($conn, $insert);
                    echo'<h1>Reservation completed</h1>';
        
                }
                  
                
                else
                {
                    echo 'shit';
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

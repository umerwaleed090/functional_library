<?php
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
                        <li><a href="viewreserve.php"><span>VIEW</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">

                <table id="resulttablelogin">
                <tr>
                    <th>ISBN</th>
                    <th>BookTitle</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>Year</th>
                    <th>CategoryID</th>
                    <th>Reserved</th>
                </tr>
               

                    <?php
        if(isset($_GET['submit-search']))
        {
            $search = mysqli_real_escape_string($conn,$_GET['search']);
            $cid = mysqli_real_escape_string($conn,$_GET['category']);
            $sql = "select * from books where (BookTitle like '%$search%' or Author like '%$search%') AND (CategoryID LIKE '%$cid%') ";
            $result = mysqli_query($conn,$sql);
            $quaryresult = mysqli_num_rows($result);
            
            if($quaryresult > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $isbn = $row['ISBN'];
                    $state = $row['Reserved'];
                    echo "<tr>
                        <td>".$row['ISBN']."<span></td>
                        <td>".$row['BookTitle']."</td>
                        <td>".$row['Author']."</td>
                        <td>".$row['Edition']."</td>
                        <td>".$row['Year']."</td>
                        <td>".$row['CategoryID']."</td>
                        <td>".$row['Reserved']."</td>";
                    
                        if($row['Reserved']=='N')
                    {
                       ?>
                       <form action="reserve.php" method="post"><td colspan=7><button name="enter"  class="seperate" value="<?php echo $isbn ?>">Reserve</button></td></tr></form>
                       <?php
                    }
                    else
                    {
                       echo'<div><td colspan=7><button class="seperate">Reserved</button></td></tr></div>';
 
                    }
                        
                }
            }
            else
            {
                echo"no results found";
            }
        }
    
    ?>
            
       
       
                </table>

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

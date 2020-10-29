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
                        <li><a href="index.php"><span>HOME</span></a></li>
                        <li><a href="Login.php"><span>LOGIN</span></a></li>
                        <li><a href="signup.php"><span>SIGNUP</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">

                <table id="resulttable">
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
            echo $cid;
            $sql = "select * from books where (BookTitle like '%$search%' or Author like '%$search%') AND (CategoryID LIKE '%$cid%') ";
            $result = mysqli_query($conn,$sql);
            $no_of_results = mysqli_num_rows($result);
            if (!isset($_GET['page'])) {
                        $page_no = 1;
                    } else {
                        $page_no = $_GET['page'];
                    }
            $results_per_page = 5;
            $this_page_first_result = ($page_no-1)*$results_per_page;
            $number_of_pages = ceil($no_of_results/$results_per_page);
            
            
            $sql = "select * from books where (BookTitle like '%$search%' or Author like '%$search%') AND (CategoryID LIKE '%$cid%') LIMIT " . $this_page_first_result . "," . $results_per_page;
            
            $result = mysqli_query($conn,$sql);
            $no_of_results = mysqli_num_rows($result);
            
            if($no_of_results > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>
                        <td>".$row['ISBN']."</td>
                        <td>".$row['BookTitle']."</td>
                        <td>".$row['Author']."</td>
                        <td>".$row['Edition']."</td>
                        <td>".$row['Year']."</td>
                        <td>".$row['CategoryID']."</td>
                        <td>".$row['Reserved']."</td>
                    
                    
                    
                        <tr>";
                        
                        
                }
            }
            else
            {
                echo"no results found";
            }
        }
    ?>
                </table>
                <?php
        for ($page=1; $page <= $number_of_pages ; $page++) {
            if ($page==$page_no)
            {
                echo '<div style="width:45px; height:45px; background-color:#2c3e50; margin-top:15px; margin-left:15px; margin-right:15px; align-items:center; text-align:center; position:relative; display:inline-block; border:2px solid black;"><span style="color:#ecf0f1; line-height:45px; font-weight:bold; user-select:none;">' . $page . '</span></div>';
            }
            else 
            {
                echo '<a href="' . $_SERVER['PHP_SELF'] . '?search=' . urlencode($_GET['search']) . '&submit-search='.urlencode($_GET['submit-search']). '&category='.urlencode($_GET['category']). '&page='. $page .' "><div style="width:45px; height:45px; background-color:#ecf0f1; margin-top:15px; margin-left:15px; margin-right:15px; align-items:center; text-align:center; position:relative; display:inline-block; "><span style="color:#2c3e50; line-height:45px; font-weight:bold; user-select:none;">' . $page . '</span></div></a>';
            }
        }?>
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

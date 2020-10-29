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
                  if(isset($_SESSION['firstname']))
                   { 
                      echo '<div class="float_left">
                        <p class="top_heading"><sapn id="top">WellCome to your acount</sapn</p>
                        </div>';
                       echo $_SESSION['firstname'];
                      
                  }
                   
                   
                }
                else
                {

                  echo '<div class="float_left">
                        <p class="top_heading"><sapn id="top">Wanna Log In</sapn</p>
                        </div>';  
                }
                
                
                ?>
              
              
                <nav>
                    <ul>
                        <li><a href="login_index.php"><span>HOME</span></a></li>
                        <li><a href="Login.php"><span>YourAcc</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">
              
                <form action="login_search.php" method="GET">
                    <h1>Umer's Library</h1>
                    <div class="search_engine">
                        <div class="search_bar">
                            <div class="search_box">
                                <input type="text" name="search" placeholder="Search....">
                            </div>
                            <div class="submit_search">
                                <button type="submit" name="submit-search">Submit</button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="search_filter">
                        <div class="categories_section">
                            <div class="category-dropdown">
                                <select name="category">
                                    <option class="options" value="">All Categories</option>
                                    <option class="options" value="1">Health</option>
                                    <option class="options" value="2">Business</option>
                                    <option class="options" value="3">Biography</option>
                                    <option class="options" value="4">Technology </option>
                                </select>
                            </div>
                        
                          
                        </div>
                        <div class="search-by_section">
                            <h2>Filter Fields</h2>
                            <div class="filter_options">
                                <div class="radio-button_group">
                                    <input type="radio" name="search-by" value="All" id="radio-1">
                                    <label for="radio-1">All</label>
                                </div>
                                <div class="radio-button_group">
                                    <input type="radio" name="search-by" value="Title" id="radio-2">
                                    <label for="radio-2">Title</label>
                                </div>
                                <div class="radio-button_group">
                                    <input type="radio" name="search-by" value="Author" id="radio-3">
                                    <label for="radio-3">Author</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

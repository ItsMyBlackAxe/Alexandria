<!DOCTYPE html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script>

        if(sessionStorage.getItem("logStatus") == "false" || sessionStorage.getItem("logStatus") == null)
        {
            window.stop();
            window.open("index.php", "_self");
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body class="h-100" onload="retrieveData()">
    <?php
        
        include 'C:\wamp64\www\WampMember\Alexandria\connect.php';
        

        $memberQ = "select * from member";
        $bookQ = "select * from book";
        $catQ = "select count(ISBN),category from book group by category";
        $borrowQ = "select * from borrow where DATE(ISSUEDDATE) = CURDATE()";
        $returnQ = "select * from borrow WHERE RETURNDATE=CURDATE()";
        $pendingQ = "select * from book where availability = 'NO'";

        if ($con->connect_error)
        {
            die("Connection error " . $con->connect_error);
        }
        else
        {
            if ($result = $con->query($memberQ))
            {
                $memberCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }

            if ($result = $con->query($bookQ))
            {
                $bookCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }

            if ($result = $con->query($catQ))
            {
                $categoryCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }

            if ($result = $con->query($borrowQ))
            {
                $borrowCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }

            if ($result = $con->query($returnQ))
            {
                $returnCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }

            if ($result = $con->query($pendingQ))
            {
                $pendingCount = mysqli_num_rows($result);
                mysqli_free_result($result);
            }
        } 
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white border-bottom p-0">
                        <div class="d-table m-auto navbar-brand " style="line-height: 25px;">
                            <!-- <img class="d-inline-block align-top mr-1" style="max-width: 25px;" src="book.png"> -->
                            <span class="d-inline">Library of Alexandria</span>
                        </div>
                    </nav>
                </div>
                <div class="nav-wrapper"> 
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link selected" href=#>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manageBooks.php">
                                <span>Manage Books</span>                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Books/IssueBooks.php">
                              <span>Issue Books</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="issuedBooks.php">
                                <span>View Issued Books</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Members/ViewMember.php">
                                <span>View Members</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="userProfile.php">
                                <span>User Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="About.html">
                                <span>About</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="col-10 p-0 offset-2">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar justify-content-end navbar-light flex-nowrap p-0" style="box-shadow: 0 0.2rem 1rem rgba(0, 0, 0, 0.1)">
                        <ul class="navbar-nav border-left flex-row">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="yc.jpeg">
                                    <span class="d-inline-block" id="userName">UserName</span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="userProfile.php">
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="logout()">
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="container-fluid px-4">
                    <div class="row no-gutters py-4">
                        <div class="col-4 text-left mb-0">
                            <span class="text-uppercase page-subtitle">Dashboard</span>
                            <h3 class="page-title">Overview</h3>
                        </div>
                    </div>

                    <!-- Stat Blocks Row 1 -->
                    <div class="row">
                
                        <div class="col-4 mb-4">
                            <a href="Members/ViewMember.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Registered Members</span>
                                                <h1 class="my-3 cardvalue"><?php echo $memberCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-4 mb-4">
                            <a href="manageBooks.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Total Books</span>
                                                <h1 class="my-3 cardvalue" id="bookCount"><?php echo $bookCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-4 mb-4">
                            <a href="manageBooks.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Book Categories</span>
                                                <h1 class="my-3 cardvalue"><?php echo $categoryCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    
                    <!-- Stat Blocks Row 2 -->
                    <div class="row">
                        
                        <div class="col-4 mb-4">
                            <a href="issuedBooks.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Borrowed Today</span>
                                                <h1 class="my-3 cardvalue"><?php echo $borrowCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
    
                        <div class="col-4 mb-4">
                            <a href="manageBooks.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Returned Today</span>
                                                <h1 class="my-3 cardvalue"><?php echo $returnCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
    
                        <div class="col-4 mb-4">
                            <a href="issuedBooks.php"> 
                                <div class="stats card">
                                    <div class="card-header mycolor"></div>
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats_data text-center">
                                                <span class="stats_label text-uppercase">Pending Returns</span>
                                                <h1 class="my-3 cardvalue"><?php echo $pendingCount; ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>                        

                    </div>
                </div>

            </main>
            
        </div>
    </div>

    <script>

        function retrieveData()
        {
            sessionStorage.setItem("logStatus", "idle");
            const data = JSON.parse(sessionStorage.getItem("profileData"));
            document.getElementById("userName").innerHTML = data[2];
        }

        function logout()
        {
            sessionStorage.clear();
            sessionStorage.setItem("logStatus", "false");
            window.open("index.php", "_self");
        }
    </script>    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<!doctype html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/50d9db007e.js"></script>
    <link href="IssueBooks.css" rel="stylesheet" type="text/css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Issue Books</title>
    
</head>

<body>
    <nav class="navbar navbar-light fixed-top mycolor">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;">Issue Book</a>

            <button style="color: white;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-light-toggler-icon">
                    <i class="fa-solid fa-bars" style="color: white;"></i>
                </span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Library of Alexandria</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="IssueBooks.php">Issue Book</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ReturnBooks.php">Return Book</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="row">
        <div class="col-3 d-flex offset-1">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://localhost/LibMSv1.0/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Issue books</li>
                </ol>
            </nav>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="container flex-column">
        <form class="needs-validation" novalidate action="" method="POST">
            <div class="row">
                <div class="col-6 p-2">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="BookISBN" id="BookISBN" placeholder="Enter Book ISBN" aria-label="BookISBN" required maxlength="13" pattern="[0-9]{13}">
                        <label for="BookISBN">Enter ISBN</label>
                        <div class="invalid-feedback">
                            Please enter a valid ISBN.
                        </div>
                    </div>
                </div>
                <div class="col-2 p-2">
                    <input style="background-color: rgb(22, 160, 133); color: white; height: 56px;" type="submit" name="submit_avail" id="submit_avail" class="form-control" value="Check Availability">
                </div>
            </div>
            <script>
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        var forms = document.getElementsByClassName('needs-validation');
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </form>
        <div class="row p-2 mb-1">
            <hr>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "BlackAxe12");
        $db = mysqli_select_db($con, 'alexandria');

        if (isset($_POST['submit_avail'])) {
            $id = $_POST['BookISBN'];
            $sql = "SELECT * FROM book where ISBN='$id'";
            $query_run = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($query_run)) {
        ?>
                <?php $avail = $row['AVAILABILITY'] ?>
                <form name="formBook" action="" method="POST">
                    <div class="row mt-5">
                        <h3 style="color:#3a3d3b;">Book Card</h3>
                        <div class="col p-2 mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Availability" placeholder="Available/Not Available" aria-label="Availability" readonly value="<?php echo $avail ?>">
                                <label for="Availability">Availability</label>
                            </div>
                        </div>

                        <div class="col p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="bISBN" placeholder="ISBN" aria-label="bISBN" readonly value="<?php echo $row['ISBN'] ?>">
                                <label for="bISBN">ISBN</label>
                            </div>
                        </div>
                        <div class="col p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="title" placeholder="Title" aria-label="title" readonly value="<?php echo $row['TITLE'] ?>">
                                <label for="title">Title</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="BookAuthor" placeholder="Author" aria-label="BookAuthor" readonly value="<?php echo $row['AUTHOR'] ?>">
                                <label for="BookAuthor">Author</label>
                            </div>
                        </div>
                        <div class="col-2 p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="BookCategory" placeholder="Category" aria-label="BookCategory" readonly value="<?php echo $row['CATEGORY'] ?>">
                                <label for="BookCategory">Book Category</label>
                            </div>
                        </div>
                        <div class="col-2 p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ADate" placeholder="Arrival Date" aria-label="ADate" readonly value="<?php echo $row['ARRIVALDATE'] ?>">
                                <label for="ADate">Arrival Date</label>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            if ($avail == "YES") {
            ?>
                <form class="needs-validation" novalidate method="POST" action="Insert.php">
                    <div class="row mt-5">
                        <h3 style="color:#3a3d3b;">Issue Book</h3>
                    </div>
                    <div class="row">
                        <input type="text" name="bookisbn" value="<?php echo $id ?>" hidden>
                    </div>
                    <div class="row">
                        <div class="col-6 p-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="MemberID" id="MemberID" placeholder="Enter Member ID" aria-label="MemberID" maxlength="5" required pattern="[M]{1}[I]{1}[0-9]{3}">
                                <label for="MemberID">Member ID</label>
                                <div class="invalid-feedback">
                                    Please enter a valid Member ID.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="IDate" id="IDate" placeholder="Issue Date" aria-label="IDate" value="<?= date('Y-m-d', time()); ?>" readonly>
                                <label for="IDate">Issue Date</label>
                            </div>
                        </div>
                        <div class="col p-2">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="DDate" id="DDate" placeholder="Due Date" aria-label="DDate" required min="<?= date('Y-m-d', time()); ?>">
                                <label for="DDate">Due Date</label>
                                <div class="invalid-feedback">
                                    Please select a valid date.
                                </div>
                                <input type="date" class="form-control" name="RDate" id="RDate" hidden value="<?= null ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-2">
                            <input style="background-color: rgb(22, 160, 133); color: white;" type="submit" name="submit_issue" id="submit_issue" class="form-control" value="Issue Book">
                        </div>
                    </div>
                    <script>
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                var forms = document.getElementsByClassName('needs-validation');
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </form>


        <?php

            }
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
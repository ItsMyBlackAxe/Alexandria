<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/50d9db007e.js"></script>
    <link rel="stylesheet" href="SearchMember.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Search Member</title>
</head>

<body>
    <nav class="navbar navbar-light fixed-top mycolor">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;">Search Member</a>

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
                            <a class="nav-link" href="ViewMember.php">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="SearchMember.php">Search Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="MemberReg.php">Add Member</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="row">
        <div class="col-3 d-flex offset-1">
            <nav aria-label="breadcrumb" class="main-breadcrumb p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://localhost/WampMember/Alexandria/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search Member</li>
                </ol>
            </nav>
        </div>
    </div>
    <br>
    <div class="container">
        <form class="needs-validation" novalidate action="" method="POST">
            <div class="row">
                <div class="col-6 p-2">
                    <input type="text" class="form-control" name="memID" id="memID" placeholder="Enter Member ID" aria-label="memberID" required maxlength="5" pattern="[M]{1}[I]{1}[0-9]{3}">
                    <div class="invalid-feedback">
                        Please enter a valid Member ID.
                    </div>
                </div>
                <div class="col-1 p-2">
                    <input style="background-color: rgb(22, 160, 133); color: white;" name="submit_search" id="submit_search" type="submit" class="form-control" value="Search">
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

        if (isset($_POST['submit_search'])) {
            $id = $_POST['memID'];
            $sql = "SELECT * FROM member where MEMBERID='$id'";
            $query_run = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($query_run)) {
        ?>
                <h3 style="color:#3a3d3b;">Member Profile Card</h3>
                <div class="wrapper mb-2 mt-3">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                </div>
                <script>
                    const wrapper = document.querySelector(".wrapper");
                    const img = document.querySelector("img");
                    if (!(img.src = "Uploads/<?php echo $id ?>.jpg")) {
                        img.src = "placeholder.jpg";
                    };
                    wrapper.classList.add("active");
                </script>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col p-2">
                            <label for="MemberCategory">Category</label>
                            <input type="text" class="form-control" id="MemberCategory" name="MemberCategory" aria-label="MemberCategory" readonly value="<?php echo $row['CATEGORY'] ?>">
                        </div>

                        <div class="col p-2">
                            <label for="Salutation">Salutation</label>
                            <input type="text" class="form-control" id="Salutation" name="Salutation" aria-label="Salutation" readonly value="<?php echo $row['SALUTATION'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <label for="MemberName">Full Name</label>
                            <input type="text" class="form-control" id="MemberName" name="MemberName" aria-label="MemberName" readonly value="<?php echo $row['FNAME'] . " " . $row['LNAME'] ?>">
                        </div>
                        <div class="col p-2">
                            <label for="Gender">Gender</label>
                            <input type="text" class="form-control" id="Gender" name="Gender" aria-label="Gender" readonly value="<?php echo $row['GENDER'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <label for="DOB">DOB</label>
                            <input type="text" class="form-control" id="DOB" name="DOB" aria-label="DOB" readonly value="<?php echo $row['DOB'] ?>">
                        </div>
                        <div class="col p-2">
                            <label for="NIC">NIC/Passport No.</label>
                            <input type="text" class="form-control" id="NIC" name="NIC" aria-label="NIC" readonly value="<?php echo $row['NIC'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" name="Address" aria-label="Address" readonly value="<?php echo $row['ADDRESSLINE1'] ?>">
                        </div>
                        <div class="col p-2">
                            <label for="City">City</label>
                            <input type="text" class="form-control" id="City" name="City" aria-label="City" readonly value="<?php echo $row['CITY'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <label for="PostalCode">Postal Code</label>
                            <input type="text" class="form-control" id="PostalCode" name="PostalCode" aria-label="PostalCode" readonly value="<?php echo $row['POSTALCODE'] ?>">
                        </div>
                        <div class="col p-2">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="Email" aria-label="Email" readonly value="<?php echo $row['EMAIL'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <label for="PhoneNo">Phone No.</label>
                            <input type="text" class="form-control" id="PhoneNo" name="PhoneNo" aria-label="PhoneNo" readonly value="<?php echo $row['CONTACT'] ?>">
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="ViewMember.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/50d9db007e.js"></script>

  <title>Members</title>
</head>

<nav class="navbar navbar-light fixed-top mycolor">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white;">Members</a>

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
            <a class="nav-link active" aria-current="page" href="ViewMember.php">Members</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SearchMember.php">Search Member</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MemberReg.php">Add Member</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<body>
  <br><br><br><br>

  <div class="container">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/WampMember/Alexandria/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">View Members</li>
        </ol>
    </nav>

    <br>
    <h2>Members</h2>
    <input class="form-control" id="myInput" type="text" placeholder="Search by any field..">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Member ID</th>
          <th scope="col">Category</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">NIC/Paspport</th>
          <th scope="col">Phone</th>
          <th scope="col">
            <center>Delete</center>
          </th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php

        $sql = "Select * from `member` Order by `MEMBERID` asc";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['MEMBERID'];
            $category = $row['CATEGORY'];
            $fname = $row['FNAME'];
            $lname = $row['LNAME'];
            $nic = $row['NIC'];
            $phone = $row['CONTACT'];
            echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $category . '</td>
        <td>' . $fname . '</td>
        <td>' . $lname . '</td>
        <td>' . $nic . '</td>
        <td>' . $phone . '</td>
        <td>
        <a  href="delete.php?deleteid=' . $id . '"  style="color:red;"><center><i class="fa-solid fa-trash-can"></i></center></a>
        </td>
      </tr>';
          }
        }
        ?>
      </tbody>
    </table>

  </div>

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
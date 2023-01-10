<?php
$con = mysqli_connect("localhost", "root", "BlackAxe12", "alexandria");
?>

<?php
$query = "select * from member order by MEMBERID desc limit 1";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);
$lastid = $row['MEMBERID'];
if ($lastid == "") {
    $memID = "MI1";
} else {
    $memID = substr($lastid, 2);
    $memID = intval($memID);
    if (strlen(($memID + 1)) == 1) {
        $memID = "MI00" . ($memID + 1);
    } else if (strlen($memID + 1) == 2) {
        $memID = "MI0" . ($memID + 1);
    } else if (strlen($memID + 1) == 1) {
        $memID = "MI" . ($memID + 1);
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberCat = $_POST['memberCat'];
    $salutation = $_POST['salutation'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $memberID = $_POST['memberID'];
    $nic_pass = $_POST['nic_pass'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $addressline1 = $_POST['addressline1'];
    $addressline2 = $_POST['addressline2'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (!$con) {
        die("Connection Failed" . mysqli_connect_error());
    } else {
        $sql = "insert into member values ('$memberID', '$fname', '$lname', '$nic_pass', '$phone','$email', '$postal', '$addressline1', '$addressline2', '$city','$memberCat', '$salutation', '$gender', '$dob')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Record inserted');</script>";
            $id = $_POST['getID'];
            $files = $_FILES['getImg'];
            $fileName = $_FILES['getImg']['name'];
            $fileTmpName = $_FILES['getImg']['tmp_name'];
            $fileSize = $_FILES['getImg']['size'];
            $fileError = $_FILES['getImg']['error'];
            $fileType = $_FILES['getImg']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 500000) {
                        $fileNameNew = uniqid('', true) . "." . "jpg";
                        $fileDestination = 'Uploads/' . $id . "." . "jpg";
                        move_uploaded_file($fileTmpName, $fileDestination);
                        echo "<script>alert('File Uploaded');</script>";
                        header('location:MemberReg.php');
                    } else {
                        echo "Your file is too big.";
                    }
                } else {
                    echo "There was an error uploading your file.";
                }
            } else {
                echo "You Cannot Upload Files of this Type.";
            }
        } else {
            echo "<script>alert('Record insert failed');</script>";
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/50d9db007e.js"></script>

    <link rel="stylesheet" href="MemberReg.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Register Member</title>
</head>

<body>
    <nav class="navbar navbar-light fixed-top mycolor">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;">Add Member</a>

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
                            <a class="nav-link" href="SearchMember.php">Search Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="MemberReg.php">Add Member</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="scroll">
        <nav aria-label="breadcrumb" class="main-breadcrumb p-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/WampMember/Alexandria/dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Member</li>
            </ol>
        </nav>
        <form class="needs-validation" novalidate id="forms" name="memberForm" method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="false">
            <div class="row p-2">
                <div class="col">
                    <label for="getImg" class="form-label">Upload Image *</label>
                    <input class="form-control" type="file" id="getImg" name="getImg" required>
                    <div class="invalid-feedback">
                        Please upload a valid image.
                    </div>
                    <input type="text" id="getID" name="getID" value="<?php echo $memID; ?>" hidden>
                </div>
            </div>
            <div class="row p-2">
                <label for="memberCat" class="form-label bt-1">Personal Details</label>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" name="memberCat" id="memberCat" aria-label="Default select example" required>
                            <option selected disabled value="" hidden>Select</option>
                            <option value="Student">Student</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>
                        <label for="memberCat">Member Category *</label>
                        <div class="invalid-feedback">
                            Please select a valid category.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" name="salutation" id="salutation" aria-label="Default select example" required>
                            <option selected disabled value="" hidden>Select</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                            <option value="Prof">Prof</option>
                        </select>
                        <label for="salutation">Salutation *</label>
                        <div class="invalid-feedback">
                            Please select a valid salutation.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" aria-label="First name" required pattern="[a-zA-Z ]{1,30}">
                        <label for="fname">First Name *</label>
                        <div class="invalid-feedback">
                            Please enter a valid first name.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" aria-label="Last name" required pattern="[a-zA-Z ]{1,30}">
                        <label for="lname">Last Name *</label>
                        <div class="invalid-feedback">
                            Please enter a valid last name.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-n2 p-2">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3" style="background-color: rgb(22, 160, 133);color: white;">Member ID</span>
                        <input type="text" name="memberID" class="form-control" id="memberID" value="<?php echo $memID; ?>" aria-describedby="basic-addon3" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="nic_pass" id="nic_pass" class="form-control" placeholder="NIC/Passport No." aria-label="NIC/Passport No." required pattern="[0-9]{9}[vV]{1}|[0-9]{12}|[N]{1}[0-9]{7}|[O]{1}[L]{1}[0-9]{7}|[D]{1}[0-9]{7}">
                        <label for="nic_pass">NIC/Passport No. *</label>
                        <div class="invalid-feedback">
                            Please enter a valid NIC/Passport No.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" name="gender" id="gender" aria-label="Default select example" required>
                            <option selected disabled value="" hidden>Select</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>
                            <option value="Rather not say">Rather not say</option>
                        </select>
                        <label for="gender">Gender *</label>
                        <div class="invalid-feedback">
                            Please select a gender.
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row form-group">
                        <div class="form-floating">
                            <input type="date" name="dob" id="dob" class="form-control" required max="<?= date('Y-m-d', time()); ?>">
                            <label for="dob">&nbsp;&nbsp;Date of Birth *</label>
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <label for="addressline1" class="form-label">Contact Details</label>
                <div class="form-floating">
                    <input type="address" name="addressline1" class="form-control" id="addressline1" placeholder="Address Line 1 - (Street address, P.O. Box, Company Name)" aria-label="address" required>
                    <label for="addressline1">&nbsp;&nbsp;Address Line 1 - (Street address, P.O. Box, Company Name) *</label>
                    <div class="invalid-feedback">
                        Please enter the address.
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="form-floating">
                    <input type="address" name="addressline2" class="form-control" id="addressline2" placeholder="Address Line 2 - (Apartment, suite, unit, building, floor, etc)" aria-label="address2">
                    <label for="addressline2">&nbsp;&nbsp;Address Line 2 - (Apartment, suite, unit, building, floor, etc)</label>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" aria-label="City" required>
                        <label for="city">City *</label>
                        <div class="invalid-feedback">
                            Please enter the city.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="postal" class="form-control" id="postal" placeholder="Postal Code" aria-label="postal" required maxlength="5" pattern="[0-9]{5}">
                        <label for="postal">Postal Code *</label>
                        <div class="invalid-feedback">
                            Please enter a valid postal code.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" aria-label="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <label for="email">Email *</label>
                        <div class="invalid-feedback">
                            Please enter a valid email ID.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone No." aria-label="phone" required maxlength="12" pattern="[+]{1}[9]{1}[4]{1}[0-9]{9}">
                        <label for="phone">Phone *</label>
                        <div class="invalid-feedback">
                            Please enter a valid phone no.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <label><br>*Required Field</label>
            </div>
            <div class="submit_butt row p-3">
                <button onclick="document.getElementById('submit_add').click()">Add</button>
                <input type="submit" name="submit_add" id="submit_add" value="submit" hidden>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
</body>

</html>
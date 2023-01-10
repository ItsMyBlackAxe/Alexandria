<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="userProfile.css">

    <title>User Profile</title>
  </head>

  <body onload="retrieveData()">    
      <nav class="navbar navbar-dark mycolor">
          <div class="container-fluid justify-content-start">
            <span class="navbar-brand navbar-dark display-1 mb-0">Library of Alexandria</span>
          </div>
      </nav>
    
    <div class="container">
      <div class="main-body">    

          <!-- Breadcrumb -->          

        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>

            <!-- /Breadcrumb -->

            <form name="User Profile" >

              <div class="row gutters-sm">
                <div class="col-md-4">
                  <div class="card" style="height: 283.8px;">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <label><h4 id="un">User Name</h4></label><br>
                          <label class="text-secondary mb-1" id="desig">Designation</label>                         
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <label id="name">Name</label>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <label id="email">Email</label>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">NIC</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <label id="nic">NIC</label>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Contact No</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <label id="cno">Contact</label>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <label id="add">Address</label>
                        </div>
                      </div>
                    </div>
                </div>
    
                </div>
              </div>
            </form>
            </div>
        </div>

    <script>
      function retrieveData()
      {
        const data = JSON.parse(sessionStorage.getItem("profileData"));
        document.getElementById("un").innerHTML = data[2];
        document.getElementById("desig").innerHTML = data[1];
        document.getElementById("name").innerHTML = data[2];
        document.getElementById("email").innerHTML = data[3];
        document.getElementById("nic").innerHTML = data[4];
        document.getElementById("cno").innerHTML = data[5];
        document.getElementById("add").innerHTML = data[6];
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>




                    
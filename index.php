<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet" type="text/css">
    <title>Login</title>
    <script>
        sessionStorage.clear();
        sessionStorage.setItem("logStatus", "false");
    </script>
  </head>
  
  <body>
      <nav class="navbar navbar-dark fixed-top mycolor">
          <div class="container-fluid justify-content-sm-start justify-content-center">
                <span class="navbar-brand display-1 mb-0">Library of Alexandria</span>
          </div>
      </nav>
      <div class="d-flex flex-column min-vh-100 justify-content-center">
          <div class="row">
              <div class="col-md-5 mx-auto">
                  <div class="myform shadow">
                      <div class="col-md-12 text-center">
                        <h2>Log in</h2>
                      </div>
                      <form method="post" name="loginform" onsubmit="validateInputs()" action="login.php">
                          <div class="mb-3">
                                <label for="emailInput" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailInput" aria-describedby="invalidEmailFeedback" name="email" onkeyup="validateEmail()">
                                <div class="invalid-feedback" id="invalidEmailFeedback">
                                    Enter a valid email address
                                </div>
                          </div>
                          <div class="mb-3">
                                <label for="pswrdInput" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pswrdInput" name="pswrd" aria-describedby="invalidpswrdFeedback">
                                <div class="invalid-feedback" id="invalidpswrdFeedback">
                                    Incorrect password
                                </div>
                                <div class="form-text">
                                    <a href="#" class="link-dark" style="cursor: pointer; text-decoration: none;">Forgot your password?</a>
                                </div>
                          </div>
                          <button type="submit" name="Login" class="btn mycolor-btn" >Log In</button><!--removed the on click validation here-->
                      </form>
                  </div>
              </div>
          </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>

</html>
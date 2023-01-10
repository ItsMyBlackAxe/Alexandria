<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="issuedBooks.css" rel="stylesheet">

    <title>Issued Books</title>
  </head>
  
  <body>
      
      <div class="container-fluid justify-content-sm-start justify-content-center navbar navbar-dark mycolor">
            <span class="navbar-brand display-1 mb-0">Library of Alexandria</span>
      </div>
      
      <div class="row">
      <div class="col-12">
        <div class="col-md-10 container-fluid">
        <br>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Issued Books</li>
            </ol>
        </nav>
        <h3>Issued Books</h3><br>
      </div>
    </div>
      </div>

      <div class="row">
        <div class="col-12 container">
        <div class="col-md-10 container">
        <form method="POST" id="issuedbooks">
          <img src="searchIcon.svg" height="25px" width="25px" onclick="search()">
          <input type="text" size="30" name="q" id="q" value="" onkeyup="search()"></input>    
            <select class="form-select-sm" name="picker" onchange="submitForm()">
              <option value="x" hidden="true" selected="true">Sort by</option>
              <option value="isbn">ISBN</option>
              <option value="bname">Book Name</option>
              <option value="idate">Issue Date</option>
              <option value="mname">Member</option>
              <option value="mid">Member ID</option>
              <option value="ddate">Due Date</option>
            </select>
          </form>
        </div>
    </div>
      </div>

      <div class="row">
        <div class="col-12 justify-content-center container">
        <div class="col-10 container"><br>
          <table class="table table-striped col-md-10" id="table">
            <thead>
              <th>ISBN</th>
              <th>Book Name</th>
              <th>Issue Date</th>
              <th>Member</th>
              <th>Member ID</th>
              <th>Due Date</th>
            </thead>
            
            <?php  
                include 'C:\wamp64\www\WampMember\Alexandria\connect.php';
                
                if($con->connect_error)
                {
                  die("Connection error " .$con->connect_error);
                }
                else
                {
                
                  if(isset($_POST['picker']))
                  {
                    $option = $_POST['picker'];

                  
                  
                    switch($option)
                    {
                      default:
                      {
                        $sql="select BORROW.ISBN, 
                                BOOK.TITLE, 
                                BORROW.ISSUEDDATE, 
                                MEMBER.FNAME, 
                                MEMBER.LNAME, 
                                MEMBER.MEMBERID, 
                                BORROW.DUEDATE 
                        FROM BORROW
                        INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                        INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                        ORDER BY BORROW.ISSUEDDATE DESC;";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_assoc()) 
                        {
                          echo "<tr>";
                          echo "<td>" . $row['ISBN'] . "</td>";
                          echo "<td>" . $row['TITLE'] . "</td>";
                          echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                          echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                          echo "<td>" . $row['MEMBERID'] . "</td>";
                          echo "<td>" . $row['DUEDATE'] . "</td>";
                          echo "</tr>";
                        }
                        break;
                      }

                      case "isbn":
                        {
                          $sql="select BORROW.ISBN, 
                                BOOK.TITLE, 
                                BORROW.ISSUEDDATE, 
                                MEMBER.FNAME, 
                                MEMBER.LNAME, 
                                MEMBER.MEMBERID, 
                                BORROW.DUEDATE 
                          FROM BORROW
                          INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                          INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                          ORDER BY BORROW.ISBN;";
                          $result = $con->query($sql);

                          while ($row = $result->fetch_assoc()) 
                          {
                            echo "<tr>";
                            echo "<td>" . $row['ISBN'] . "</td>";
                            echo "<td>" . $row['TITLE'] . "</td>";
                            echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                            echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                            echo "<td>" . $row['MEMBERID'] . "</td>";
                            echo "<td>" . $row['DUEDATE'] . "</td>";
                            echo "</tr>";
                          }
                          break;
                        }

                        case "bname":
                          {
                            $sql="select BORROW.ISBN, 
                                  BOOK.TITLE, 
                                  BORROW.ISSUEDDATE, 
                                  MEMBER.FNAME, 
                                  MEMBER.LNAME, 
                                  MEMBER.MEMBERID, 
                                  BORROW.DUEDATE 
                            FROM BORROW
                            INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                            INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                            ORDER BY BOOK.TITLE;";
                            $result = $con->query($sql);
    
                            while ($row = $result->fetch_assoc()) 
                            {
                              echo "<tr>";
                              echo "<td>" . $row['ISBN'] . "</td>";
                              echo "<td>" . $row['TITLE'] . "</td>";
                              echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                              echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                              echo "<td>" . $row['MEMBERID'] . "</td>";
                              echo "<td>" . $row['DUEDATE'] . "</td>";
                              echo "</tr>";
                            }
                            break;
                          }

                          case "mname":
                            {
                              $sql="select BORROW.ISBN, 
                                    BOOK.TITLE, 
                                    BORROW.ISSUEDDATE, 
                                    MEMBER.FNAME, 
                                    MEMBER.LNAME, 
                                    MEMBER.MEMBERID, 
                                    BORROW.DUEDATE 
                              FROM BORROW
                              INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                              INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                              ORDER BY MEMBER.FNAME, MEMBER.LNAME;";
                              $result = $con->query($sql);
      
                              while ($row = $result->fetch_assoc()) 
                              {
                                echo "<tr>";
                                echo "<td>" . $row['ISBN'] . "</td>";
                                echo "<td>" . $row['TITLE'] . "</td>";
                                echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                                echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                                echo "<td>" . $row['MEMBERID'] . "</td>";
                                echo "<td>" . $row['DUEDATE'] . "</td>";
                                echo "</tr>";
                              }
                              break;
                            }

                            case "mid":
                              {
                                $sql="select BORROW.ISBN, 
                                      BOOK.TITLE, 
                                      BORROW.ISSUEDDATE, 
                                      MEMBER.FNAME, 
                                      MEMBER.LNAME, 
                                      MEMBER.MEMBERID, 
                                      BORROW.DUEDATE 
                                FROM BORROW
                                INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                                INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                                ORDER BY MEMBER.MEMBERID;";
                                $result = $con->query($sql);
        
                                while ($row = $result->fetch_assoc()) 
                                {
                                  echo "<tr>";
                                  echo "<td>" . $row['ISBN'] . "</td>";
                                  echo "<td>" . $row['TITLE'] . "</td>";
                                  echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                                  echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                                  echo "<td>" . $row['MEMBERID'] . "</td>";
                                  echo "<td>" . $row['DUEDATE'] . "</td>";
                                  echo "</tr>";
                                }
                                break;
                              }

                              case "ddate":
                                {
                                  $sql="select BORROW.ISBN, 
                                        BOOK.TITLE, 
                                        BORROW.ISSUEDDATE, 
                                        MEMBER.FNAME, 
                                        MEMBER.LNAME, 
                                        MEMBER.MEMBERID, 
                                        BORROW.DUEDATE 
                                  FROM BORROW
                                  INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                                  INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                                  ORDER BY BORROW.DUEDATE;";
                                  $result = $con->query($sql);
          
                                  while ($row = $result->fetch_assoc()) 
                                  {
                                    echo "<tr>";
                                    echo "<td>" . $row['ISBN'] . "</td>";
                                    echo "<td>" . $row['TITLE'] . "</td>";
                                    echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                                    echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                                    echo "<td>" . $row['MEMBERID'] . "</td>";
                                    echo "<td>" . $row['DUEDATE'] . "</td>";
                                    echo "</tr>";
                                  }
                                  break;
                                }
                    }
                  }
                  else
                    {
                        $sql="select BORROW.ISBN, 
                           BOOK.TITLE, 
                         BORROW.ISSUEDDATE, 
                         MEMBER.FNAME, 
                         MEMBER.LNAME, 
                         MEMBER.MEMBERID, 
                         BORROW.DUEDATE 
                         FROM BORROW
                         INNER JOIN MEMBER ON BORROW.MEMBERID = MEMBER.MEMBERID
                         INNER JOIN BOOK ON BORROW.ISBN = BOOK.ISBN
                         ORDER BY BORROW.ISSUEDDATE;";
                         $result = $con->query($sql);

                        while ($row = $result->fetch_assoc()) 
                        {
                            echo "<tr>";
                            echo "<td>" . $row['ISBN'] . "</td>";
                            echo "<td>" . $row['TITLE'] . "</td>";
                            echo "<td>" . $row['ISSUEDDATE'] . "</td>";
                            echo "<td>" . $row['FNAME'] . " ". $row['LNAME'] . "</td>";
                            echo "<td>" . $row['MEMBERID'] . "</td>";
                            echo "<td>" . $row['DUEDATE'] . "</td>";
                            echo "</tr>";
                        }
                    }
                  $con->close();	
                }
              ?>
            
          
          </table>
              </div>
        </div>
      </div>

      <script type="text/javascript" lang="javascript">
      function submitForm()
      {
          var form = document.getElementById("issuedbooks");
          form.submit();
      }

      

      function search()
      {
          
          var q = document.getElementById("q");
          var v = q.value.toLowerCase(); //input string
          var table = document.getElementById("table");
          var rows = table.getElementsByTagName("tr");
          var txt;

          for ( var i = 1; i < rows.length; i++ ) 
          {
            var columns = rows[i].getElementsByTagName("td");
            for(var index = 0; index < columns.length; index++)
            {         
              if ( columns[index] ) 
              {
                txt = columns[index].innerText || columns[index].textContent;
                if (txt.toLowerCase().indexOf(v) > -1) 
                {
                rows[i].style.display = "";
                break;
                }                
              }

              if(index==columns.length-1)
              {
                rows[i].style.display = "none";
              }
              
            } 
          }
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>

</html>
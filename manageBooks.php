<!--Book Crud-->
<?php 
include 'manageBooks_database.php'; 
?>

<?php
include 'C:\wamp64\www\WampMember\Alexandria\connect.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="manageBooks.css" rel="stylesheet" type="text/css">

  <title>Manage Books</title>
  <style>
    td
    {
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark fixed-top mycolor">
    <div class="container-fluid justify-content-sm-start justify-content-center">
      <span class="navbar-brand display-1 mb-0">Library of Alexandria</span>
    </div>
  </nav>

  <br>

  <div class="container my-5">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Manage Books</li>
        </ol>
    </nav>
    <div class="row my-2">
      <div class=" col-12 col-md-3 col-lg-3 col-xl-2 py-1">
            <label for="select_filter" class="form-label">Sort By</label>
            <select name="filter_select" class="form-select-sm w-10" id="select_filter" style="margin-top: 1px;">
              <option value="isbn">ISBN</option>
              <option value="title" selected>Title</option>
              <option value="author">Author</option>
              <option value="category">Category</option>
            </select>
      </div>
          
      <div class="col-12 col-md-9 col-lg-4 col-xl-5 py-1">
        <label for="search_input" class="form-label">Filter Text</label>
        <input class="w-10" type="text" name="txt_s_data" id="search_input"  onkeyup="search()"></input>
        <button name="btn_select_f" class="btn btn-sm mycolor-btn" onclick="search()">Search</button>
        <button class="btn btn-sm mycolor-btn" onclick="window.location.reload()">Reset</button>
      </div>

      <div class="col-12 col-md-12 col-lg-5 col-xl-5 py-1">
        <div class="d-flex justify-content-start justify-content-lg-end">
          <!--Insert book-->
          <button type="button" class="btn mycolor-btn" data-bs-toggle="modal" data-bs-target="#addbook" style="white-space: nowrap;">Add Book</button>
          <div class="modal fade" id="addbook" data-bs-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Enter Book Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="addBook" method="POST" onsubmit="return validateInsert()" action="manageBooks_database.php">
                    <div class="mb-3">
                      <label>Enter ISBN:</label><br>
                      <input class="w-100" type="text" name="txt_i_ISBN">
                    </div>
                    <div class="mb-3">
                      <label>Enter Title:</label><br>
                      <input class="w-100" type="text" name="txt_i_title"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Author:</label><br>
                      <input class="w-100" type="text" name="txt_i_author"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Category:</label><br>
                      <input class="w-100" type="text" name="txt_i_category"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Arrival Date:</label><br>
                      <input class="w-100" type="date" name="txt_i_arrivalDate" ></textarea>
                    </div>
  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit_add" class="btn mycolor-btn">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!--End Insert book-->
  
          <!--Update book-->
          <button type="button" class="btn mycolor-btn mx-1" data-bs-toggle="modal" data-bs-target="#updatebook"  style="white-space: nowrap;">Update Book</button>
          <div class="modal fade" id="updatebook" data-bs-backdrop="static">
            <div class="modal-dialog modal-fullscreen-below-xxl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Update Book Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="updateBook" method="post" onsubmit="return validateUpdate()" action="manageBooks_database.php">
                    <div class="mb-3">
                      <label>Enter ISBN:</label><br>
                      <input class="w-100" type="text" name="txt_u_search">
                      <!-- <button type="submit" name="btn_search" class="btn btn-outline-primary btn-sm ">Search</button> -->
                    </div>
                    <div class="mb-3">
                      <label>Enter Title:</label><br>
                      <input class="w-100" type="text" name="txt_u_title" placeholder="<?php echo @$TitleUS; ?>"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Author:</label><br>
                      <input class="w-100" type="text" name="txt_u_author" placeholder="<?php echo @$AuthorUS; ?>"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Category:</label><br>
                      <input class="w-100" type="text" name="txt_u_category" placeholder="<?php echo @$CategoryUS; ?>"></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Enter Arrival Date:</label><br>
                      <input class="w-100" type="date" name="txt_u_arrivalDate" placeholder="<?php echo @$ArrivalDateUS; ?>"></textarea>
                    </div>
  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="btn_update" class="btn mycolor-btn">Update</button>
                </div>
                </form>
  
              </div>
            </div>
          </div>
          <!--End Update book-->
  
          <!--Delete book-->
          <button type="button" class="btn mycolor-btn" data-bs-toggle="modal" data-bs-target="#deletebook" style="white-space: nowrap;">Delete Book</button>
          <div class="modal fade" id="deletebook" data-bs-backdrop="static">
            <div class="modal-dialog modal-fullscreen-below-xxl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Delete Book</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="deleteBook" method="post" onsubmit="return validateDelete()" action="manageBooks_database.php">
                    <div class="mb-3">
                      <label>Enter ISBN:</label><br>
                      <input class="w-100" type="text" name="txt_d_isbn"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="btn_delete" class="btn mycolor-btn">Delete</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!--End Delete book-->
        </div>
        
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="data_table" >
            <thead>
              <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Arrival Date</th>
              </tr>
            </thead>
            <tbody>


              <?php

              if ($con->connect_error) {
                die("Connection error " . $con->connect_error);
              } else {
                
                  $sql = "Select * from book order by ISBN";
                  $result = $con->query($sql);
                  
                      while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['ISBN'] . "</td>";
                      echo "<td>" . $row['TITLE'] . "</td>";
                      echo "<td>" . $row['AUTHOR'] . "</td>";
                      echo "<td>" . $row['CATEGORY'] . "</td>";
                      echo "<td>" . $row['ARRIVALDATE'] . "</td>";
                      echo "</tr>";
                    }
                }
                
              $con->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      function search()
      {
        var input, filter, table, tRowCollection, td, i, txtValue, select, index;

        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("data_table");
        tRowCollection = table.getElementsByTagName("tr");

        select = document.getElementById("select_filter");
        index = select.selectedIndex;

        for(i = 1; i < tRowCollection.length; i++)
        {
          td = tRowCollection[i].getElementsByTagName("td")[index];

          if(td)
          {

            txtValue = td.innerText || td.textContent;

            if(txtValue.toUpperCase().indexOf(filter) > -1)
            {
              tRowCollection[i].style.display = "";
            }
            else
            {
              tRowCollection[i].style.display = "none";
            }
          }
        }

        document.getElementById("data_table").classList.remove("table-striped");
      }
    </script>

<script src="manageBook.js"></script>
</body>

</html>
<?php  
  $con=new mysqli("localhost","root","BlackAxe12","alexandria");

  if($con->connect_error)
  {
  	die("Connection error " .$con->connect_error);
  }
  else
  {
    // insert book
    if(isset($_POST['submit_add']))
	{
          if(!empty($_POST['txt_i_ISBN']) &&!empty($_POST['txt_i_title']) && !empty($_POST['txt_i_author']) && !empty($_POST['txt_i_category']) && !empty($_POST['txt_i_arrivalDate']))
          {
            $ISBNA = $_POST['txt_i_ISBN'];
            $TitleA = $_POST['txt_i_title'];
            $AuthorA = $_POST['txt_i_author'];
            $CategoryA = $_POST['txt_i_category'];
            $ArrivalDateA = $_POST['txt_i_arrivalDate'];
                
            $sql="insert into book values(
            '$ISBNA',
            '$TitleA',
            '$AuthorA',            
            '$CategoryA',
            '$ArrivalDateA','YES')";

            if($con->query($sql))
            {
            echo"<script>alert('Record inserted');</script>";
            header( "Refresh:0; url=manageBooks.php", true, 303);
            }
            else
            {
            echo"<script>alert('Record insert failed');</script>";
            header( "Refresh:0; url=manageBooks.php", true, 303);
            } 
        }
        else
        {
            echo"<script>alert('Enter details to fields to insert a book');</script>";
            header( "Refresh:0; url=manageBooks.php", true, 303);
        }
        
    }

    //Delete Book
    if(isset($_POST['btn_delete']))
    {
        if(!empty($_POST['txt_d_isbn']))
        {
            $ISBND = $_POST['txt_d_isbn'];
            $sql1="Select * from book where ISBN='$ISBND'";
        
            $ResultDB=$con->query($sql1);
        
            $Result=$ResultDB->fetch_assoc();   
        
            $TitleUS= $Result['TITLE'];
            
            $sqld="Delete from book where ISBN='$ISBND'";

            if($con->query($sqld))
            {
                echo'<script>alert("'.$TitleUS.'"+" has been deleted successfully");</script>';
                header( "Refresh:0; url=manageBooks.php", true, 303);
            }
            else
            {
                echo'<script>alert("Record delete failed");</script>';
                header( "Refresh:0; url=manageBooks.php", true, 303);
            } 
    
        }
        else
        {
            echo "<script>alert('Enter ISBN to delete book');</script>";
            header( "Refresh:0; url=manageBooks.php", true, 303);
        }
    }

    //update
    if (isset($_POST['btn_update'])) 
    {
        if (!empty($_POST['txt_u_search'])) 
        {
            $ISBNU = $_POST['txt_u_search'];
            $TitleU = $_POST['txt_u_title'];
            $AuthorU = $_POST['txt_u_author'];
            $CategoryU = $_POST['txt_u_category'];
            $ArrivalDateU = $_POST['txt_u_arrivalDate'];

          $sql1 = "Update book set TITLE='$TitleU',AUTHOR='$AuthorU',CATEGORY='$CategoryU',ARRIVALDATE='$ArrivalDateU' where ISBN='$ISBNU'";

          if($con->query($sql1))
            {
                echo'<script>alert("Book number "+"'.$ISBNU.'"+" has been updated successfully");</script>';
                header( "Refresh:0; url=manageBooks.php", true, 303);
            }
            else
            {
                echo'<script>alert("Record update failed");</script>';
                header( "Refresh:0; url=manageBooks.php", true, 303);
            } 
        } 
        else 
        {
          echo "<script>alert('Enter details to fields to update a book');</script>";
          header( "Refresh:0; url=manageBooks.php", true, 303);
        }
      }

    $con->close();	
  }
?>


    <!-- <?php 
      // $con=new mysqli("localhost","root","","alexandria");

      // if($con->connect_error)
      // {
      //   die("Connection error " .$con->connect_error);
      // }
      // else
      // {
      //   if(!empty($_POST['txt_u_search']))
      //   {
      //     $ISBNUS = $_POST['txt_u_search'];
      //     $sql = "Select * from book where ISBN ='$ISBNUS' ";
      //             $result = $con->query($sql);
                  
      //               $row = $result->fetch_assoc();
      //               $TitleUS=$row['TITLE'];
      //               $AuthorUS=$row['AUTHOR'];
      //               $CategoryUS=$row['CATEGORY'];
      //               $ArrivalDateUS=$row['ARRIVALDATE'];

                   
      //   }
      
      // }  
      ?> -->

      

<?php
include 'connect.php';


if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql="delete from `member` where MEMBERID='$id'";
     $result=mysqli_query($con,$sql);
     if($result) {
         header('location:ViewMember.php');
     } else {
         die(mysqli_error($con));
     }
}
?>
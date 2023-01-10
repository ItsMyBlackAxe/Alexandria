<?php

include 'C:\wamp64\www\WampMember\Alexandria\connect.php';

if (isset($_POST['submit_return'])) {
    $isbn = $_POST['BookISBN'];
    $id = $_POST['MemberID'];
    $rdate = $_POST['returnDate'];
    if (!$con) {
        echo "<script>alert('Book Does Not Exist');</script>";
    } else {
        $sql = "UPDATE book SET AVAILABILITY='YES' WHERE ISBN='$isbn'";
        $sql2 = "UPDATE borrow SET RETURNDATE='$rdate' WHERE MEMBERID='$id' AND ISBN='$isbn'";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Book Returned');</script>";
            header('location:ReturnBooks.php');
        }
        mysqli_query($con,$sql2);
    }
}

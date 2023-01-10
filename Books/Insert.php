<?php 

include 'C:\wamp64\www\WampMember\Alexandria\connect.php';

if (isset($_POST['submit_issue'])) {
    $memID = $_POST['MemberID'];
    $id = $_POST['bookisbn'];
    $idate = $_POST['IDate'];
    $ddate = $_POST['DDate'];
    // $rdate = $_POST['RDate'];

    if (!$con) {
        die("Connection Failed" . mysqli_connect_error());
    } else {
        $sql = "insert into borrow (MEMBERID,ISBN,ISSUEDDATE,DUEDATE) values ('$memID', '$id', '$idate', '$ddate')";
        $sql2 = "UPDATE book SET AVAILABILITY='NO' WHERE ISBN='$id'";
        mysqli_query($con,$sql2);
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Record inserted');</script>";
            header('location:IssueBooks.php');
        }
    }
}

?>
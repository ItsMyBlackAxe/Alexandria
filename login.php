<script>
    if(sessionStorage.getItem("logStatus") == "idle")
    {
        window.open("index.php", "_self");
    }

    function setProfileData()
    {
        sessionStorage.clear();
        sessionStorage.setItem("profileData", JSON.stringify(jsarray));
        sessionStorage.setItem("logStatus", "true");
        window.open("dashboard.php", "_self");
    }
</script>

<?php
    include 'C:\wamp64\www\WampMember\Alexandria\connect.php';
    
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    }

    $un = $_POST["email"];
    $pw = $_POST["pswrd"];

    $query = "select * from adminuser where EMAIL='$un' and PASSWORD='$pw'";
    $result = $con->query($query);
    
    
    if ($result->num_rows > 0) 
    {
        $dataArray = $result->fetch_assoc();
    
        $userName = $dataArray['USERNAME'];  
        $designation= $dataArray['DESIGNATION'];
        $name= $dataArray['NAME'];
        $email=$dataArray['EMAIL'];
        $nic=$dataArray['NIC'];
        $cno=$dataArray['CONTACTNO'];
        $address=$dataArray['ADDRESS'];

        echo"<script>jsarray = ['$userName', '$designation', '$name', '$email', '$nic', '$cno', '$address']; setProfileData();</script>";
        //header('Location:dashboard.php');//include relevant page to load here
    } 
    else 
    {
        echo"<script>alert('Login failed please try again');</script>";
        header( "Refresh:0; url=index.php", true, 303);//if failed forwards back to the login page
    }
?>

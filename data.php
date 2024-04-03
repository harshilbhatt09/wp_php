<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marksheet";

    $conn = mysqli_connect($server,$username, $password, $dbname);
    if(!$conn){
        die("connection to database failed due to: ".mysqli_connect_error());
    }
    $en_no = $_POST['en_no'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $toc = $_POST['toc'];
    $wp = $_POST['wp'];
    $dv = $_POST['dv'];
    if($_REQUEST['btn'] == "insert"){
        $sql = "INSERT INTO marksheet VALUES ('$en_no','$fname', '$lname','$toc','$wp','$dv');";
        if(mysqli_query($conn, "$sql")){
            echo("Succesfully inserted");
        }
        else{
            echo("ERROR: $sql <br> $conn->error");
        }
    }
    elseif($_REQUEST['btn'] == "delete"){
        $sql = "DELETE FROM marksheet WHERE Enrollment_Number = '$en_no';";
        if(mysqli_query($conn, "$sql")){
            echo("Succesfully deleted");
        }
        else{
            echo("ERROR: $sql <br> $conn->error");
        }
    }
    elseif($_REQUEST['btn'] == "update"){
        $sql = "UPDATE marksheet ;";
        if(mysqli_query($conn, "$sql")){
            echo("Succesfully deleted");
        }
        else{
            echo("ERROR: $sql <br> $conn->error");
        }
    }
    $conn->close();

?>
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
        $sql = "UPDATE marksheet SET ";
        if($fname != null)
            $sql = $sql."First_Name = '$fname'";
        if($lname != null){
        if($fname != null)
        $sql=$sql.",";

            $sql = $sql."Last_Name = '$lname'";}
        if($toc != null){
            if($fname != null || $lname != null) 
        $sql=$sql.","; 
            $sql = $sql."TOC = '$toc',";}
        if($wp != null)
            $sql = $sql."WP = '$wp',";
        if($dv != null)
            $sql = $sql."DV = '$dv',";
        $sql = $sql." WHERE Enrollment_Number = '$en_no';";
        
        echo("$sql");
        $hi = strpos($sql,",",strlen($sql)-10);
        // echo(strlen($sql)-1);
        if($hi == false){
            echo("$hi");
        }
        else{
            echo("hello".$hi);
        }
        // $sql = "UPDATE marksheet SET First_Name = '$fname', Last_Name = '$lname', TOC = '$toc', WP = '$wp', DV = '$dv' WHERE Enrollment_Number = '$en_no';";
        if(mysqli_query($conn, "$sql")){
            echo("Succesfully updated");
        }
        else{
            echo("ERROR: $sql <br> $conn->error");
        }
    }
    $conn->close();

?>
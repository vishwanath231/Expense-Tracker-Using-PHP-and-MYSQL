<?php

session_start();
include "../connection/config.php";

if (isset($_POST['submit'])) {
    
    $text = $_POST['text'];
    $amount = $_POST['amount'];

    

    $sql = "INSERT INTO tracker(Text, Amount) VALUES ('$text','$amount')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("location:../index.php");
    }
}


    if (isset($_GET['id'])) {
        $del_id = $_GET['id'];
        $sql = "DELETE FROM tracker WHERE ID='$del_id'";
        $result = $con->query($sql);

        if ($result == TRUE) {
            header("location:../index.php");
        } else {
            echo "Error:" . $sql . "<br>" . $con->error;
        }
    }
                



?>
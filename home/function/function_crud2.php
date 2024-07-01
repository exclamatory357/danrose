<?php

session_start();
include "../../config/db.php";

//update user
if (isset($_POST["updateuser"])) {
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $pass  = $_POST["pass"];
    $utype = $_POST["utype"];

    $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`uname`='$uname',`pass`='$pass',`user_type_id`='$utype' WHERE user_id = '$id'";
    $query = mysqli_query($con, $query);
    if (!$query) {
        $_SESSION["notify"] = "failed";
        header("location: ?user");
        return;
    }
    if ($query) {
        $_SESSION["notify"] = "success";
        header("location: ?user");
        return;
    }
}
?>
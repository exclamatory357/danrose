<?php

session_start();

include "../../config/db.php";

//add cottage

if (isset($_POST["btn-cottage-add"])) {

    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    $actual_no = $_POST["actual_no"];

    $name        = $_POST["name"];

    $type         = $_POST["type"];

    $cat         = $_POST["category"];

    $max_person  = $_POST["max-person"];

    $price       = $_POST["price"];



    $sqlcott = "INSERT INTO `cottage/hall`(`img`, `actual_no`, `name`,`type`,`category`,`max_person`,`price`) 

            VALUES('$target_file','$actual_no','$name','$type','$cat','$max_person','$price')";

    $query = mysqli_query($con, $sqlcott);



    if ($query) {

        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        $_SESSION["notify"] = "success-add";

        header("location: ../?cottage");

    }else {

        $_SESSION["notify"] = "failed-add";

        header("location: ../?cottage");

    }

}

//delte cottage

if (isset($_GET["cottage-del"])) {

    $id = $_GET["cottage-del"];

    $sql = "DELETE FROM `cottage/hall` WHERE id = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-delete";

        header("location: ../?cottage");

    }else {

        echo "failed to delete";

    }

}

//delte feature

if (isset($_GET["feature-del"])) {

    $id = $_GET["feature-del"];

    $sql = "DELETE FROM `feature` WHERE id = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-delete";

        header("location: ../?features");

    }else {

        echo "failed to delete";

    }

}

//delte picture

if (isset($_GET["picture-del"])) {

    $id = $_GET["picture-del"];

    $sql = "DELETE FROM `picture` WHERE id = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-delete";

        header("location: ../?pictures");

    }else {

        echo "failed to delete";

    }

}



//add feature

if (isset($_POST["btn-feature-add"])) {

    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    $name        = $_POST["name"];

    $desc         = $_POST["desc"];

    $sql = "INSERT INTO `feature`(`img`,`name`,`desc`) 

            VALUES('$target_file','$name','$desc')";

    $query = mysqli_query($con, $sql);



    if ($query) {

        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        $_SESSION["notify"] = "success-add";

        header("location: ../?features");

    }else {

        $_SESSION["notify"] = "failed-add";

        header("location: ../?features");

    }

}



//add picture

if (isset($_POST["btn-picture-add"])) {

    $target_dir_pic = "uploads/";

    $target_file_pic = $target_dir_pic . basename($_FILES["img"]["name"]);



    $namepic         = $_POST["name"];

    $descpic         = $_POST["desc"];





    $sql2 = "INSERT INTO `picture`(`img`, `name`, `des`) VALUES ('$target_file_pic','$namepic','$descpic')"; 



    $query2 = mysqli_query($con, $sql2);



    if ($query2) {

        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file_pic);

        $_SESSION["notify"] = "success-add";

        header("location: ../?pictures");

    }else {

        $_SESSION["notify"] = "failed-add";

        header("location: ../?pictures");

    }

}


//confirmation reservation
if (isset($_GET["res-for-confirm-id"])) {

    $res_id = $_GET["res-for-confirm-id"];
    $no     = $_GET["no"];
    

    

    $sqlGet = "SELECT * FROM payment WHERE transaction_id = '$res_id'";

    $queryGet = mysqli_query($con, $sqlGet);

    //$resPay = mysqli_fetch_assoc($queryGet);

    //$vaPay = $resPay["ammount_payment"] * 2;

    $sql="UPDATE `reservation` SET `status` = 'Reserved' WHERE `trans_no` = '$res_id'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        //SMS HERE
        $text = 'Good day! this is DA Farm resort,  your reservation was successfully reserved. Thank you';

        $number = $no;
        
        
        
        exec('echo '.$text.' | gnokii --sendsms '.$number);

        $_SESSION["notify"] = "confirm";

        header("location: ../?pending");

    }else {

        $_SESSION["notify"] = "confirm-failed";

        header("location: ../?pending");

    }

}


//fullypaid reservation

if (isset($_GET["res-id"])) {

    $res_id = $_GET["res-id"];

    

    $sqlGet = "SELECT * FROM payment WHERE transaction_id = '$res_id'";

    $queryGet = mysqli_query($con, $sqlGet);

    $resPay = mysqli_fetch_assoc($queryGet);

    $vaPay = $resPay["ammount_payment"] * 2;





    $sql="UPDATE `reservation` SET `status` = 'Fullypaid' WHERE `trans_no` = '$res_id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $sqlUpdate ="UPDATE `payment` SET ammount_payment = '$vaPay', `payment_status` = 'Fullypaid' WHERE `transaction_id` = '$res_id'";

        $queryUpdate = mysqli_query($con, $sqlUpdate);

        $_SESSION["notify"] = "paid";

        header("location: ../?reserved2");

    }else {

        $_SESSION["notify"] = "paid-failed";

        header("location: ../?reserved2");

    }

}

//cancel reservation

if (isset($_GET["res-id-cancel"])) {

    $res_id_cancel = $_GET["res-id-cancel"];

    $sql="UPDATE `reservation` SET `status` = 'Canceled' WHERE `trans_no` = '$res_id_cancel'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "cancel";

        header("location: ../?pending");

    }else {

        $_SESSION["notify"] = "cancel-failed";

        header("location: ../?pending");

    }

}





//adduser



if (isset($_POST["btnAddUser"])) {

    $fname = $_POST["fname"];

    $lname = $_POST["lname"];

    $uname = $_POST["uname"];

    $pass  = $_POST["pass"];

    $utype = $_POST["utype"];

    $sql = "INSERT INTO `user`(`fname`, `lname`, `uname`, `pass`, `user_type_id`) 

                       VALUES ('$fname','$lname','$uname','$pass','$utype')";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?users");

        return;

    } 

    if(!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?users");

        return;

    }

    

}





//delte user

if (isset($_GET["user-del"])) {

    $id = $_GET["user-del"];

    $sql = "DELETE FROM `user` WHERE user_id = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-delete";

        header("location: ../?users");

    }else {

        echo "failed to delete";

    }

}



//delte feedback

if (isset($_GET["feedback-del"])) {

    $id = $_GET["feedback-del"];

    $sql = "DELETE FROM `feedback` WHERE feedback_id = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-delete";

        header("location: ../?feedback");

    }else {

        echo "failed to delete";

    }

}



//update cottage

if (isset($_POST["btn-cottage-edit"])) {

    $id = $_POST["id"];

    $actual_no  = $_POST["actual_no"];

    $name = $_POST["name"];

    $type = $_POST["type"];

    $category = $_POST["category"];

    $max_person = $_POST["max-person"];

    $price    = $_POST["price"];



    $sql = "UPDATE `cottage/hall` SET `name`='$name', `actual_no` = '$actual_no',`type`='$type',`category`='$category',`max_person`='$max_person',`price`='$price' WHERE id = '$id'";

    $query = mysqli_query($con, $sql);

    if (!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?cottage");

        return;

    }

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?cottage");

        return;

    }

}

//update user
if (isset($_POST["updateuser"])) {

    $id = $_POST["id"];

    $fname = $_POST["fname"];

    $lname = $_POST["lname"];

    $uname = $_POST["uname"];

    $pass  = $_POST["pass"];

    $utype = $_POST["utype"];



    $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`uname`='$uname',`pass`='$pass',`user_type_id`='$utype' WHERE user_id = '$id'";

    $query = mysqli_query($con, $sql);

    if (!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?users");

        return;

    }

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?users");

        return;

    }

}

if (isset($_POST["btn-feature-edit"])) {
    $get_id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];

    $sql = "UPDATE `feature` SET `name`='$name',`desc`='$desc' WHERE id = $get_id";
    $query = mysqli_query($con, $sql);

    if(!$query){
        $_SESSION["notify"] = "failed";
        header("location: ../?features");
        return;
    }
    if($query){
        $_SESSION["notify"] = "success";
        header("location: ../?features");
        return;
    }
}

if (isset($_POST["btn-picture-edit"])) {
    $get_id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];

    $sql = "UPDATE `picture` SET `name`='$name',`des`='$desc' WHERE id = $get_id";
    $query = mysqli_query($con, $sql);

    if(!$query){
        $_SESSION["notify"] = "failed";
        header("location: ../?pictures");
        return;
    }
    if($query){
        $_SESSION["notify"] = "success";
        header("location: ../?pictures");
        return;
    }
}



        // Insert Operation PUMPBOATS
if (isset($_POST["btn-pumpboat-add"])) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    $license_no = $_POST["license_no"];
    $pumpboat_no = $_POST["pumpboat_no"];
    $type = $_POST["type"];
    $category = $_POST["category"];
    $image = $target_file;
    $date_created = date('Y-m-d');

    $sqlPumpboat = "INSERT INTO `pumpboats`(`license_no`, `pumpboat_no`, `type`, `category`, `image`, `date_created`) 
                    VALUES('$license_no','$pumpboat_no','$type','$category','$image','$date_created')";
    $query = mysqli_query($con, $sqlPumpboat);

    if ($query) {
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        $_SESSION["notify"] = "success-add";
        header("location: ../?manage_pumpboats");
    } else {
        $_SESSION["notify"] = "failed-add";
        header("location: ../??manage_pumpboats");
    }
}
        // /Insert Operation PUMPBOATS


        //  Delete Operation PUMPBOATS
        if (isset($_GET["pumpboat-del"])) {
            $id = $_GET["pumpboat-del"];
            $sql = "DELETE FROM `pumpboats` WHERE id = '$id'";
            $query = mysqli_query($con, $sql);
        
            if ($query) {
                $_SESSION["notify"] = "success-delete";
                header("location: ../?manage_pumpboats");
            } else {
                $_SESSION["notify"] = "failed-delete";
                header("location: ../?manage_pumpboats");
            }
        }
        // /Delete Operation PUMPBOATS
        
        // File Upload for Edit PUMPBOAT
        if (isset($_POST["btn-pumpboat-edit"])) {
            $id = $_POST["id"];
            $license_no = $_POST["license_no"];
            $pumpboat_no = $_POST["pumpboat_no"];
            $type = $_POST["type"];
            $category = $_POST["category"];
            $date_created = $_POST["date_created"];
        
            if ($_FILES["img"]["name"]) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                $image = $target_file;
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        
                $sql = "UPDATE `pumpboats` SET `license_no`='$license_no',`pumpboat_no`='$pumpboat_no',`type`='$type',`category`='$category',`image`='$image',`date_created`='$date_created' WHERE id = '$id'";
            } else {
                $sql = "UPDATE `pumpboats` SET `license_no`='$license_no',`pumpboat_no`='$pumpboat_no',`type`='$type',`category`='$category',`date_created`='$date_created' WHERE id = '$id'";
            }
            
            $query = mysqli_query($con, $sql);
        
            if (!$query) {
                $_SESSION["notify"] = "failed";
                header("location: ../?manage_pumpboats");
                return;
            }
            if ($query) {
                $_SESSION["notify"] = "success";
                header("location: ../?manage_pumpboats");
                return;
            }
        }
        // /File Upload for Edit PUMPBOAT
        



<?php



session_start();

include "../../config/db.php";



//RESERVATION

if (isset($_GET["reserve"])) {

    $reserve          = $_GET["reserve"];

    $trans_no         = $_SESSION["trans_no"];

    $user_id          = $_SESSION["user_id"];

    //$sum              = $_SESSION["sum"];

    $date_reserve     = $_SESSION["date_reserve"];

    $date_today       = date("Y-m-d");

    $child = $_SESSION["child"];

    $adult = $_SESSION["adult"];



    $sql = "INSERT INTO `reservation`(`trans_no`, `date_reserve`, `child`,`adult`,`check_in`, `check_out`, `status`, `cottage/hall_id`, `customer_id`, `date_created`) 

            VALUES ('$trans_no','$date_reserve','$child','$adult','','','Processing','$reserve','$user_id','$date_today')";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success-reserve";

        header("location: ../?cart");

    }else {

        echo "failed reserved";

    }

}



//CHECKOUT

if (isset($_POST["btnPayment"])) {

    $u = $_POST["userid"];

    $t = $_POST["transno"];

    $p = $_POST["pay"];

    $amm = $_POST["ammount"];

    //$child = $_SESSION["child"];

    //$adult = $_SESSION["adult"];


    $sql = "INSERT INTO payment(transaction_id,ammount_payment,payment_status, ref_no) VALUES('$t','$p','Paid','$amm')";



    $query = mysqli_query($con, $sql);

    if ($query) {



        $sqlUp = "UPDATE `reservation` SET `status` = 'Pending' WHERE `trans_no` = '$t'";

        $queryUp = mysqli_query($con, $sqlUp);



        unset($_SESSION["trans_no"]);

        unset($_SESSION["sum"]);

        unset($_SESSION["date_reserve"]);

        unset($_SESSION["child"]);

        unset($_SESSION["adult"]);

        $_SESSION["trans_no"]=rand();

        header("location: ../?payment-success");



    }else {

        echo "Failed1";

    }

}

//delete reserve

if (isset($_GET["transnodelete"])) {

    $get = $_GET["transnodelete"];

    $sql = "DELETE FROM reservation WHERE trans_no = '$get'";

    $query = mysqli_query($con, $sql);

    if (!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?cart");

        return;

    }

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?cart");

        return;

    }

} 





if (isset($_POST["btn-reg"])) {

    $val1 = $_POST["fname"];

    $val2 = $_POST["lname"];

    $val3 = $_POST["contact"];

    $addr = $_POST["address"];

    $val4 = $_POST["username"];

    $val5 = $_POST["password"];



    $sql = "INSERT INTO `user`(`fname`, `lname`, `contact_no`, `address`, `uname`, `pass`, `user_type_id`) 

            VALUES ('$val1','$val2','$val3','$addr','$val4','$val5','3')";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?home");

    }else {

        $_SESSION["notify"] = "failed";

        header("location: ../?home");

    }

}







if (isset($_POST["btnFeedback"])) {

    

    $message = $_POST["message"];

    if (empty($_POST["name"])) {

        $name_me = "Anonymous";

      

    }else {

        $name_me = $_POST["name"];

       

    }

   

    $sql = "INSERT INTO `feedback`(`cust_id`, `name`, `description`) 

                           VALUES ('','$name_me','$message')";

    $query = mysqli_query($con, $sql);

    if (!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?home");

        return;

    }

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?home");

        return;

    }

}







if (isset($_POST["btnUpdateDetails"])) {



    $id     = $_POST["id"];

    $fname  = $_POST["fname"];

    $lname  = $_POST["lname"];

    $contact_no = $_POST["contact_no"];

    $address = $_POST["address"];



    $sql = "UPDATE user SET fname = '$fname', lname='$lname', contact_no = '$contact_no', `address` = '$address' WHERE user_id = '$id'";



    $query = mysqli_query($con, $sql);



    if (!$query) {

        $_SESSION["notify"] = "failed";

        header("location: ../?cart");

        return;

    }

    if ($query) {

        $_SESSION["notify"] = "success";

        header("location: ../?cart");

        return;

    }

}

if (isset($_GET["res-id-cancel"])) {

    $res_id_cancel = $_GET["res-id-cancel"];

    $sql="UPDATE `reservation` SET `status` = 'Canceled' WHERE `trans_no` = '$res_id_cancel'";

    $query = mysqli_query($con, $sql);

    if ($query) {

        $_SESSION["notify"] = "cancel";

        header("location: ../?my-res");

    }else {

        $_SESSION["notify"] = "cancel-failed";

        header("location: ../?my-res");

    }

}
<?php

 require_once "../../config/db.php";



 if (isset($_POST["res_id"])) {

     $id = $_POST["res_id"];

     $i = 1;

     $sql = "SELECT *, `reservation`.id as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    INNER JOIN payment ON payment.transaction_id = `reservation`.trans_no 

    WHERE trans_no = '$id'";

    $query = mysqli_query($con, $sql);



    $sql2 = "SELECT * FROM `payment` WHERE transaction_id = '$id'"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $timesTwo = $fetch2['ammount_payment']*2;

 echo "<table class='table table-condensed'>

        <tr class='bg-gray'>

        <th>#</th>

        <th>Date of Reservation</th>

        <th>Customer Name</th>

        <th>Cottage/Hall Name</th>

        <th>No of Child</th>

        <th>No of Adult</th>

        <th class='text-right'>Price</th>

        </tr>";

    while ($fetch = mysqli_fetch_assoc($query)) {

        $total=0;
        $child=0;
        $adult=0;
            $total += $fetch["price"]; //adding all price

            $child += $fetch["child"];

            $adult += $fetch["adult"];

            $childPrice = $child * 25; //child price

            $adultPrice = $adult * 50; //adult price

            $totalPrice = $childPrice + $adultPrice + $total; //final price

            $half = $totalPrice; //holding the final price

            $downpayment = $half/2; //downpayment



        echo "

                  <tr>

                   <td>".$i."</td>

                   <td>".date('F d, Y', strtotime($fetch["date_reserve"]))."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td>

                   <td>".$fetch["name"]."</td>

                   <td>".$fetch["child"]."</td>

                   <td>".$fetch["adult"]."</td>

                   <td class='text-right text-red'>".number_format($fetch["price"],2)."</td>

    

                  </tr>";

                 $i=$i+1;

    }

    

    echo "

    <tr>

        <td></td>  

        <td></td>  

        <td></td>  

        <td></td>

        <td></td>

        <td class='text-right'>Child($child x 25):</td>  

        <td class='text-right text-red'>".number_format($childPrice,2)."</td>

    </tr>

    <tr>

        <td></td>  

        <td></td>  

        <td></td>  

        <td></td>

        <td></td>

        <td class='text-right'>Adult($adult x 50):</td>  

        <td class='text-right text-red'>".number_format($adultPrice,2)."</td>

    </tr>";





        if ($fetch2['payment_status'] == "Paid") {

            echo "<tr>

            <td></td>  

            <td></td>  

            <td></td>  

            <td></td>

            <td></td>

            <td class='text-right'>Subtotal:</td>  

            <td class='text-right text-red'><span class='text-primary'><strong>".number_format($timesTwo,2)."</strong></span></td>

        </tr>";

        } elseif($fetch2['payment_status'] == "Fullypaid") {

            echo "";

        }





  echo "  <tr>

        <td></td>  

        <td></td>  

        <td></td>  

        <td></td>

        <td></td>";

        if ($fetch2['payment_status'] == "Paid") {

            echo "<td class='text-right'>Downpayment <span class='text-green'>(Paid)</span>:</td>";

        } elseif($fetch2['payment_status'] == "Fullypaid") {

            echo "<td class='text-right'>Total <span class='text-green'>(Fullypaid)</span></td>";

        }

        if ($fetch2['payment_status'] == "Paid") {

            echo "<td class='text-right'><strong>-".number_format($fetch2['ammount_payment'],2)."</strong></td>  ";

        } elseif($fetch2['payment_status'] == "Fullypaid") {

            echo "<td class='text-right'><strong>".number_format($fetch2['ammount_payment'],2)."</strong></td>  ";

        }

echo "</tr>";  

echo "<tr>

        <td></td>  

        <td></td>  

        <td></td>  

        <td></td>

        <td></td>";

        if ($fetch2['payment_status'] == "Paid") {

            echo "<td class='text-right'>Balance:</td>";

        } elseif($fetch2['payment_status'] == "Fullypaid") {

            echo "";

        }

        if ($fetch2['payment_status'] == "Paid") {

            echo "<td class='text-right'><strong>".number_format($fetch2['ammount_payment'],2)."</strong></td>  ";

        } elseif($fetch2['payment_status'] == "Fullypaid") {

            echo "";

        }

echo "</tr>";  

    



    

 }



?>
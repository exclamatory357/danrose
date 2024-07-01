<?php



function get_reserve($con, $user_id, $trans_no)

{
    $child=0;
    $adult=0;
    $total = 0;

    $sql = "SELECT *

            FROM

            reservation

            INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

            INNER JOIN `user` ON `user`.user_id = reservation.customer_id

            INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id

            WHERE `user_id` = '$user_id' AND `trans_no` = '$trans_no' AND `status` = 'Processing'";

    $query = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    if (mysqli_num_rows($query) > 0) {

        

        echo "<div class='row'>

                <div class='col-md-4'>

                <a href='#' data-toggle='modal' data-target='#modal-customer'><i class='fa fa-edit'></i> Edit Details</a>

                    <table>

                        <tr>

                            <th>Name:</th>

                            <td>&nbsp;&nbsp;".ucfirst($fetch2['fname'])." ".ucfirst($fetch2['lname'])."</td>

                        </tr>

                        <tr>

                            <th>Contact #:</th>

                            <td>&nbsp;&nbsp;".$fetch2['contact_no']."</td>

                        </tr>

                        <tr>

                            <th>Address:</th>

                            <td>&nbsp;&nbsp;".$fetch2['address']."</td>

                        </tr>

                    </table>

                </div>

                <div class='col-md-4'>

                

                </div>

                <div class='col-md-4'>

                <table>

                    <tr>

                        <th>Transaction #:</th>

                        <td>&nbsp;&nbsp;".$trans_no."</td>

                    </tr>

                    <!--<tr>

                        <th>Date of reservation:</th>

                        <td>&nbsp;&nbsp;</td>

                    </tr>

                    <tr>

                        <th>Total no of person:</th>

                        <td>&nbsp;&nbsp;</td>

                    </tr>-->

                </table>

                

          

        <div class='modal fade in' id='modal-customer'>

          <div class='modal-dialog modal-sm'>

            <div class='modal-content'>

              <div class='modal-header'>

                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                  <span aria-hidden='true'>×</span></button>

                <h4 class='modal-title'>Edit Details</h4>

              </div>

              <div class='modal-body'>

              <form method='post' action='function/function_crud.php'>

              <div class='form-group'>

                <label for=''>First Name</label>

                <input type='hidden' class='form-control' value='".$fetch2['user_id']."' name='id'>

                <input type='text' class='form-control' value='".$fetch2['fname']."' name='fname'>

              </div>

              <div class='form-group'>

                <label for=''>Last Name</label>

                <input type='text' class='form-control' value='".$fetch2['lname']."' name='lname'>

              </div>

              <div class='form-group'>

                <label for=''>Contact no.</label>

                <input type='text' class='form-control' value='".$fetch2['contact_no']."' name='contact_no'>

              </div>

              <div class='form-group'>

                <label for=''>Address</label>

                <input type='text' class='form-control' value='".$fetch2['address']."' name='address'>

              </div>

              </div>

              <div class='modal-footer'>

                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                <button type='submit' class='btn btn-primary' name='btnUpdateDetails'>Update</button>

              </div>

              </form>

            </div>        

          </div>

        </div>

        </div>

    </div>



        <br>

        <table class='table table-condensed'>

            <tr class='bg-gray'>

                <th>Image</th>

                <th>Name</th>

                <th>Type</th>

                <th>No. of Child</th>

                <th>No. of Adult</th>

                <th class='text-right'>Price</th>

            </tr>";



        while ($fetch = mysqli_fetch_assoc($query)) {
            
            $total += $fetch["price"]; //adding all price

            $child += $fetch["child"];

            $adult += $fetch["adult"];

            $childPrice = $child * 25; //child price

            $adultPrice = $adult * 50; //adult price

            $totalPrice = $childPrice + $adultPrice + $total; //final price

            //$half = $totalPrice; //holding the final price

            $downpayment = $totalPrice/2; //downpayment

            echo "<tr>

                   <td><img src='../admin/function/".$fetch["img"]."' width='70px'></td>  

                   <td>".$fetch["name"]."</td>  

                   <td>".$fetch["type"]."</td>  

                   <td>".$fetch["child"]."</td>

                   <td>".$fetch["adult"]."</td>                   

                   <td class='text-right'>".number_format($fetch["price"],2)."</td>  

                  </tr>";

        }

        echo "<tr>

        <td></td>  

        <td></td>  

        <td></td>  

        <td></td>

        <td class='text-right'><strong>Child($child x 25):</strong></td>  

        <td class='text-right text-red'>".number_format($childPrice,2)."</td>

    </tr>";

    echo "<tr>

                    <td></td>  

                    <td></td>  

                    <td></td>  

                    <td></td>

                    <td class='text-right'><strong>Adult($adult x 50):</strong></td>  

                    <td class='text-right text-red'>".number_format($adultPrice,2)."</td>

                </tr>";

            echo "<tr>

                    <td></td>  

                    <td></td>  

                    <td></td>  

                    <td></td>

                    <td class='text-right'><strong>Total:</strong></td>  

                    <td class='text-right text-green'><strong>".number_format($totalPrice,2)."</strong></td>

                </tr>";

                echo "<tr>

                    <td></td>  

                    <td></td>  

                    <td></td>  

                    <td></td>

                    <td class='text-right'><strong>Downpayment:</strong></td>  

                    <td class='text-right text-blue'><strong>".number_format($downpayment,2)."</strong></td>

                </tr>";

            echo "<tr>

                    <td></td>  

                    <td></td>  

                    <td></td>  

                    <td></td>  

                    <td><a href='function/function_crud.php?transnodelete=".$trans_no."' class='btn btn-danger pull-right'>Remove All</a></td>

                    <td width='20px'><button type='button' data-toggle='modal' data-target='#modal-pay' class='btn btn-success btn-md'>Checkout</button></td>

                </tr>";
 
            echo "<form action='function/function_crud.php' method='post'><div class='modal fade in' id='modal-pay'>

                    <div class='modal-dialog modal-sm mt-6'>

                    <div class='modal-content'>

                        <div class='modal-header'>

                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                            <span aria-hidden='true'>×</span></button>

                        <h4 class='modal-title'>Scan to Pay</h4>

                        </div>

                        <div class='modal-body'>

                          <center>

                           

                            <img src='image/cash.jpg' width='260px'>

                          </center>
                          <h4><label>Amount to pay:<span>&nbsp;&nbsp;₱".number_format($downpayment,2)."</span></label></h4>
                          <div class='form-group'>
                            <label>Ref. no.</label>
                            <input type='hidden' value='".$user_id."' name='userid'>
                            <input type='hidden' value='".$trans_no."' name='transno'>
                            <input type='hidden' value='".$downpayment."' name='pay'>
                            <input type='text' class='form-control' id='input-ref' placeholder='Please Enter the Ref. no.' name='ammount' required>
                           </div>

                        </div>

                        <div class='modal-footer'>

                        <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                        <button type='submit' class='btn btn-success' id='btnPayment' name='btnPayment'>Proceed Checkout</button>

                        </div>

                    </div>

                    </div>

                </div></form>";

    }

    else{

        echo "<center><h4>Empty</h4></center>";

    }

}



function get_customer_info($con, $user_id, $trans_no)

{

   $sql = "SELECT * FROM `user` WHERE `user_id` = '$user_id'";

   $query = mysqli_query($con,$sql);

   $fetch = mysqli_fetch_assoc($query);



   echo "<table>

            <tr>

                <th>Name:</th>

                <td>&nbsp;&nbsp;".ucfirst($fetch['fname'])." ".ucfirst($fetch['lname'])."</td>

            </tr>

            <tr>

                <th>Contact #:</th>

                <td>&nbsp;&nbsp;".$fetch['contact_no']."</td>

            </tr>

            <tr>

                <th>Address:</th>

                <td>&nbsp;&nbsp;".$fetch['address']."</td>

            </tr>

         </table>"; 

}



function get_count($con, $user_id, $trans_no)

{

    $sql = "SELECT *

            FROM

            reservation

            INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

            INNER JOIN `user` ON `user`.user_id = reservation.customer_id

            INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id

            WHERE `user_id` = '$user_id' AND `trans_no` = '$trans_no' AND `status` = 'Processing'";

    $query = mysqli_query($con, $sql);

    $count = mysqli_num_rows($query);



    echo $count;

        

 

}

function get_picture($con)

{

    $sql = "SELECT * FROM `picture`";

    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)) {

            echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>

            <a class='thumbnail' href='#' data-image-id='' data-toggle='modal' data-title=''

               data-image='../admin/function/".$fetch['img']."'

               data-target='#image-gallery'>

                <img class='img-thumbnail'

                     src='../admin/function/".$fetch['img']."'

                     alt='Another alt text'>

            </a>

        </div>";

        }

    }else {

        echo "no picture to display";

    }

}



function get_feature($con)

{

    $sql = "SELECT * FROM `feature`";

    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)) {

            echo "<div class='swiper-slide'>

                        <div class='card'>

                        <img class='card-img-top' src='../admin/function/".$fetch['img']."' alt='Card image cap' width='300px' height='300px'>

                        <div class='card-body'>

                        <h5 class='card-title border-bottom pb-3'>".$fetch['name']."<a href='#' class='float-right d-inline-flex share'></a></h5>

                        <p class='card-text pr-3 pl-3'>".$fetch['desc']."</p>

                        </div>

                    </div>

                </div>";

        }

    }else {

        echo "no picture to display";

    }

}



function get_feedbacks($con)

{

    $sql = "SELECT * FROM `feedback`";

    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)) {

            echo "<div class='swiper-slide'>

                  <div class='col-sm-12'>

                    <p>&ldquo;".$fetch["description"].".&rdquo;</p>

                    <small><strong>".ucfirst($fetch["name"])."</strong></small>

                   </div>

                </div>";

        }

    }else {

        echo "<div class='swiper-slide'>

        <div class='col-sm-12'>

          <p>&ldquo;No feedbacks yet.&rdquo;</p>

          <small><strong></strong></small>

         </div>

      </div>";

    }

}



function get_my_res($con, $user_id)

{

    $sql = "SELECT *, `reservation`.id as rec_id FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id WHERE user_id = '$user_id'";

    $query = mysqli_query($con, $sql);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 

                  <tr>

                  

                   <td>".$fetch["trans_no"]."</td>

                   <td>".date('F d, Y', strtotime($fetch["date_reserve"]))."</td>

                

                   <td>".$fetch["name"]."</td>

   

                   <td class='text-primary'>".number_format($fetch["price"])."</td>

                   <td><span class='badge'>".$fetch["status"]."</span></td>

                

                  </tr>

                 ";

               

        }

    }else {

        echo "no result";

    }

}





function get_pending($con, $userid)

{

    $sql = "SELECT *, `reservation`.id as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    WHERE `user_id` = '$userid' AND status != 'Processing' GROUP BY `trans_no`";

    $query = mysqli_query($con, $sql);

    

    $sql2 = "SELECT * FROM payment"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {
        

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td> 

                   <td><span class='badge bg-orange'>".$fetch["status"]."</span></td>

                   <td>".date("M d, Y", strtotime($fetch["date_created"]))."</td>

                   

                  <td>

                   <buton type='button' data-toggle='modal' data-target='#modal-view-".$fetch['res']."' class='btn btn-success view' id='".$fetch['trans_no']."'>View</buton></td>

                  </tr>

                 </tbody>";

                 $i=$i+1;



            echo "<div class='modal fade in' id='modal-view-".$fetch['res']."'>

                <div class='modal-dialog modal-lg'>

                <div class='modal-content'>

                    <div class='modal-header bg-green'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Transaction #: ".$fetch['trans_no']."</h4>

                    </div>

                    <div class='modal-body'>

                    <label>Customer Name: </label> ".ucfirst($fetch["fname"])." ".ucfirst($fetch["lname"])."<br>

                    <label>Customer Address: </label> ".ucfirst($fetch["address"])."<br><br>

                     <div id='view-reserve'></div>

                    </div>

                    <div class='modal-footer'>

                
                    
                    <a href='#' class='btn btn-danger' data-toggle='modal' data-target='#modalconfirm".$fetch['trans_no']."'>Cancel</a>
                    <button type='button' class='btn bg-maroon' data-dismiss='modal'>Close</button>

                    </div>

                </div>

                </div>

            </div>";

            echo  "<div class='modal fade in' id='modalconfirm".$fetch['trans_no']."'>
          <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
              <div class='modal-header bg-red'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>×</span></button>
                <h4 class='modal-title'>Confirmation</h4>
              </div>
              <div class='modal-body'>
                <center><h3>Are you sure?</h3></center>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
                <a href='function/function_crud.php?res-id-cancel=".$fetch['trans_no']."' class='btn btn-danger'>Cancel</a>
              </div>
            </div>
          </div> 
        </div>";

                

        }

    }else {

        echo "<tr>
               <td colspan='6'><center>No Reservation Yet</center></td>
              </tr>";

    }

}

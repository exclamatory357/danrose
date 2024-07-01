<?php

if (isset($_GET["my-res"])) {?>
    <!-- Main content -->
    <section class="content">
        
       <div class="container">
           <br>
           <br>
         <div class="box body-login p-5">
           <div class="row">
             <div class="col-md-1">

             </div>
             <div class="col-md-10">
            <h3>My Reservation</h3>
               <table id="example2" class="table table-bordered" width="100%">
                   <thead>
                   <tr>
                       <th>#</th>
                       <th>Transaction #</th>
                       <th>Customer Name</th>
                       <th>Status</th>
                       <th>Date Created</th>
                       <th><i class="fa fa-cogs"></i> Options</th>
                       
                   </tr>
                   </thead>
                   <?php get_pending($con, $_SESSION["user_id"])?>
               </table>
            
             </div>
             <div class="col-md-1">

             </div>
           </div>
         </div>
       </div>

    </section>
<?php }?>
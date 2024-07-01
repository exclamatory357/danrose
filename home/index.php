<?php
 session_start();
 include "../config/db.php";
 include "function/function_get.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DRMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "shared/link.php"?>
  <!-- Demo styles -->
  <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        /*font-size: 13px;*/
        background: #ffffff61;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .feedbackbtn2{
    position:fixed;
    right: 0;
    bottom: 0;
    right: 10px;
    bottom: 55px;
    z-index: 999;
}
  
  /* typography */
h1 {
  text-align:center;
  margin-bottom:-20px !important;
}
p {
  font-style:italic;
}
    </style>
</head>
<body class="hold-transition skin-green layout-top-nav">
<button class="btn bg-maroon feedbackbtn2" data-toggle="modal" data-target="#modal-feedback2"><i class="fa fa-commenting-o"></i> Feedback</button>   
<div class="wrapper">

  <?php include "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="">
      <!-- HOME PAGE-->
      <?php include "view/home.php"?>
      <!-- GALLERY PAGE -->
      <?php include "view/gallery.php"?>
      <!-- RESERVATION PAGE -->
      <?php include "view/reservation.php"?>
      <!-- MY-RESERVE PAGE -->
      <?php include "view/my-reserve.php"?>
      <!-- CART PAGE -->
      <?php include "view/cart.php"?>
 
    </div>

        <form method="post" action="function/function_crud.php">
        <div class="modal fade in" id="modal-feedback2">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Give Feedback</h4>
              </div>
              <div class="modal-body">
              
              <div class="form-group">
                  <label>What is your Name? (Optional)</label>
                  <input type="text" class="form-control" rows="3" placeholder="Enter ..." name="name">
                </div>
              <div class="form-group">
                  <label>How's your experience?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="message" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnFeedback">Submit Feedback</button>
              
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </from>
  </div>
  <?php include "shared/footer.php"?>
</div>



<?php include "shared/script.php"?>
<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
  //TOASTER

  $("body").on("click",".view", function (e) {
   e.preventDefault();
   let res_id = $(this).attr("id");
   $.ajax({
     url: "function/view.php",
     type: "POST",
     data: {res_id: res_id},
     cache: false,
     success: function (result) {
       $("div#view-reserve").html(result);
     }
   });
 });
 
  <?php
    if (isset($_SESSION["notify"])) {
        if ($_SESSION["notify"]=="success-reg") {?>
            toastr.success('Data successfully Registered.', 'Success Registration!', 
            {positionClass: 'toast-bottom-right',
                timeOut: 5000,  
                titleClass: 'toast-title',   
                messageClass: 'toast-message', 
                target: 'body',
                newestOnTop: true,
                preventDuplicates: false,
                progressBar: true
            })
        <?php }
        if ($_SESSION["notify"]=="success-reserve") {?>
          toastr.success('Reservation Added.', 'Success Added!', 
          {positionClass: 'toast-bottom-right',
              timeOut: 5000,  
              titleClass: 'toast-title',   
              messageClass: 'toast-message', 
              target: 'body',
              newestOnTop: true,
              preventDuplicates: false,
              progressBar: true
          })
      <?php }
      if ($_SESSION["notify"]=="failed") {?>
        toastr.error('Failed.', 'Failed Action!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="success") {?>
        toastr.success('Success.', 'Success Action!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="invalid") {?>
      toastr.error('Invalid.', 'Invalid password!', 
      {positionClass: 'toast-bottom-right',
          timeOut: 5000,  
          titleClass: 'toast-title',   
          messageClass: 'toast-message', 
          target: 'body',
          newestOnTop: true,
          preventDuplicates: false,
          progressBar: true
      })
  <?php }
  if ($_SESSION["notify"]=="not-found") {?>
    toastr.error('Not found.', 'Record not found!', 
    {positionClass: 'toast-bottom-right',
        timeOut: 5000,  
        titleClass: 'toast-title',   
        messageClass: 'toast-message', 
        target: 'body',
        newestOnTop: true,
        preventDuplicates: false,
        progressBar: true
    })
<?php }
if ($_SESSION["notify"]=="cancel") {?>
  toastr.error('', 'Cacelled success!', 
  {positionClass: 'toast-bottom-right',
      timeOut: 5000,  
      titleClass: 'toast-title',   
      messageClass: 'toast-message', 
      target: 'body',
      newestOnTop: true,
      preventDuplicates: false,
      progressBar: true
  })
<?php }
   unset($_SESSION["notify"]); }
   ?>

   $(".btn-check").on("click", function name(params) {
       $.ajax({
           method: "POST",
           url: "function/get_res.php",
           data: $("#check-avail-form").serialize(),
           cache: false,
           beforeSend: function name(params) {
                $(".btn-check").text("Checking Please wait...")
           },
           success: function (result) {
               $(".res").html(result);
               $(".btn-check").text("Check Availability")
           }
       })
   })

   <?php if (isset($_GET["home"])) {?>
       $("#home").addClass("active");
  <?php }?>
  <?php if (isset($_GET["reservation"])) {?>
       $("#reserve").addClass("active");
  <?php }?>
  <?php if (isset($_GET["cart"])) {?>
       $("#cart").addClass("active");
  <?php }?>

  let modalId = $('#image-gallery');

$(document)
  .ready(function () {
 
                
       
    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>
</body>
</html>

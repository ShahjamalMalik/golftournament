<?php
  /**
   * donate.php is the donation page
   * start the session so we can access our session variables that are active in the session
   */
  session_start();
  /**
   * If the session variable 'id' exists, check if it equals 1 (logged in as admin) to make sure the admin link on the navbar is visible, if not set it to hidden
   */
  if(isset($_SESSION['id'])) {
    if($_SESSION['id'] == 1){
      $_SESSION['adminHide'] = '';
    }else{
      $_SESSION['adminHide'] = 'hidden';
    }
  } else {
    $_SESSION['adminHide'] = 'hidden';
  }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<title>DEVELOPMENT - Dan Segin Golf Tournament Website</title>
    <link rel="icon" href="images/ddsm-logo.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>	
	<body>
    <div>
        <div>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php"><img
                src="images/ddsm-logo.png"
                alt="ddsm-logo"
                width="100"
                height="50"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="registration.php">Registration <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="donate.php">Donate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="photos.php">Photos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sponsors.php">Sponsors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="store.php">Store</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <?php 
                  /**
                   * If the session variable is empty then the navlink for admin will show, if it is set to hidden it will be set to hidden in css and not show
                   */
                  echo '<li class="nav-item">';
                  echo  '<a '.$_SESSION['adminHide'].' class="nav-link" href="admin.php">Admin</a>';
                  echo '</li>';
                ?>
              </ul>
            </div>
          </nav>
      
        </div>

        <div class="container">
          <div  class="d-flex justify-content-center mt-5">
            <h1 class="headingDonation mb-5">Donation</h1>
          </div>
          <div class="d-flex justify-content-center mb-5">
            <h4 class="customTextRegistration">Please feel free to make a donation to the Heart & Stroke Foundation</h4>
          </div>
          <div class="d-flex justify-content-center mb-5">
            <h10>Please note that all donations larger tha $20 will receive a charitable tax receipt (Please allow up to 4 weeks for processing of receipt)</h10>
          </div>
          <hr>
            <div class="d-flex justify-content-center mt-5 mb-5 ">
              <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 29rem; height: 27rem;">
                <div class="styleCardRegistration p-2"><img src="images/icons/icons8-donation.png"/></div>
                <div class="card-body mt-5">
                  <h5 class="card-title">Donation</h5>
                  <p class="card-text">Thank you for your support </p>
                  <br>
                  <a href="https://square.link/u/OM56Xrsv?src=embed" class="btn btn-primary btn-lg mb-5">Donate now</a>
                </div>                    
              </div>               
            </div>
         
          <div class="d-flex justify-content-center mt-5 mb-5">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 29rem; height: 27rem;">
              <div class="styleCardRegistration p-2"><img src="images/icons/icons8-thanks.png"/></div>
              <div class="card-body mt-5">
                <h5 class="card-title">Sponsors Donation</h5>
                <p class="card-text"> $200.00 </p>
                <a  href="https://square.link/u/WZqqW1Om?src=embed"class="btn btn-primary">Pay now</a>
              </div>
            </div>
          </div>
          <hr>

          <div class="d-flex justify-content-center mt-5">
            <h5 class="customContactRegistration">Question ?</h5>
          </div>
          <div class="d-flex justify-content-center">
            <h5 class="customContactRegistration">For more information, please contact: </h5>
          </div>
          <div class="d-flex justify-content-center">
            <p><img src="images/icons/icons8-send-email.png"/> <a href="mailto:danseginmemorialgolf@gmail.com">danseginmemorialgolf@gmail.com</a></p>
          </div>        
      </div>
        <!-- <div>
          <div><div style="
          overflow: auto;
          display: flex;
          flex-direction: column;
          justify-content: flex-end;
          align-items: center;
          width: 259px;
          background: #FFFFFF;
          border: 1px solid rgba(0, 0, 0, 0.1);
          box-shadow: -2px 10px 5px rgba(0, 0, 0, 0);
          border-radius: 10px;
          font-family: SQ Market, SQ Market, Helvetica, Arial, sans-serif;
          ">
          <div style="padding: 20px;">
          <p style="
            font-size: 18px;
            line-height: 20px;
          ">Click the button to Proceed</p>
          <p style="
            font-size: 18px;
            line-height: 20px;
            font-weight: 600;
          ">Entered by customer</p>
          <a target="_blank" data-url="https://square.link/u/OM56Xrsv?src=embd" href="https://square.link/u/OM56Xrsv?src=embed" style="
            display: inline-block;
            font-size: 18px;
            line-height: 48px;
            height: 48px;
            color: #ffffff;
            min-width: 212px;
            background-color: #006aff;
            text-align: center;
            box-shadow: 0 0 0 1px rgba(0,0,0,.1) inset;
            border-radius: 50px;
          ">Donate</a>
          </div>
          <div>
            <div><div style="
            overflow: auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            width: 259px;
            background: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: -2px 10px 5px rgba(0, 0, 0, 0);
            border-radius: 10px;
            font-family: Roboto, SQ Market, Helvetica, Arial, sans-serif;
            ">
            <div style="padding: 20px;">
            <p style="
              font-size: 18px;
              line-height: 20px;
            ">Sponsors Donation</p>
            <p style="
              font-size: 18px;
              line-height: 20px;
              font-weight: 600;
            ">$200.00</p>
            <a target="_blank" data-url="https://square.link/u/WZqqW1Om?src=embd" href="https://square.link/u/WZqqW1Om?src=embed" style="
              display: inline-block;
              font-size: 18px;
              line-height: 48px;
              height: 48px;
              color: #ffffff;
              min-width: 212px;
              background-color: #006aff;
              text-align: center;
              box-shadow: 0 0 0 1px rgba(0,0,0,.1) inset;
              border-radius: 50px;
            ">Pay now</a>
            </div>
              <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
          </div>
          </div> -->
          
            <script>
              function showCheckoutWindow(e) {
                e.preventDefault();
          
                const url = document.getElementById('embedded-checkout-modal-checkout-button').getAttribute('data-url');
                const title = 'Square Online Checkout';
          
                // Some platforms embed in an iframe, so we want to top window to calculate sizes correctly
                const topWindow = window.top ? window.top : window;
          
                // Fixes dual-screen position                                Most browsers          Firefox
                const dualScreenLeft = topWindow.screenLeft !==  undefined ? topWindow.screenLeft : topWindow.screenX;
                const dualScreenTop = topWindow.screenTop !==  undefined   ? topWindow.screenTop  : topWindow.screenY;
          
                const width = topWindow.innerWidth ? topWindow.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
                const height = topWindow.innerHeight ? topWindow.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
          
                const h = height * .75;
                const w = 500;
          
                const systemZoom = width / topWindow.screen.availWidth;
                const left = (width - w) / 2 / systemZoom + dualScreenLeft;
                const top = (height - h) / 2 / systemZoom + dualScreenTop;
                const newWindow = window.open(url, title, `scrollbars=yes, width=${w / systemZoom}, height=${h / systemZoom}, top=${top}, left=${left}`);
          
                if (window.focus) newWindow.focus();
              }
          
              // This overrides the default checkout button click handler to show the embed modal
              // instead of opening a new tab with the given link url
              document.getElementById('embedded-checkout-modal-checkout-button').addEventListener('click', function (e) {
                showCheckoutWindow(e);
              });
            </script>
          </div>
    </div>
    <!-- FOOTER -->
    <footer class="customFooter">
      <div class="row justify-content-md-center">
        <div class="col-md-auto">
          <div class="d-flex flex-column align-items-center">
          <br/>
          <h2 class="mb-4">Follow us</h2>
              <figure>
                    <a href="mailto:danseginmemorialgolf@gmail.com"><img src="images/icons/gmail.png" alt="Emai" width="60" height="60"/></a>
                    <a href="https://www.facebook.com/danseginmemorialgolf"><img src="images/icons/facebook.png" alt="Facebook" width="60" height="60"/></a>
                    <a href="https://www.instagram.com/dandseginmemorialgolf/?fbclid=IwAR18jpY5QWajdv2qD22snOqdFg9yY8u1v3NKgMBsPdCKKcG0i_VwxMs1JhA"><img src="images/icons/instagram.png" alt="Instagram" width="60" height="60"/></a>
                    <a href="https://twitter.com/ddseginmemorial"><img src="images/icons/twitter.png" alt="Twitter" width="60" height="60"/></a>
                    <br/>
                                        
                </figure>
            </div>
        </div>
      </div>  
      <div class="row justify-content-md-center">
    </footer>
    </body>
</html>

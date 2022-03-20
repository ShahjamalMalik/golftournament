

<!DOCTYPE html>
<html lang="en">
  <?php   
    include_once 'server/connect.php'; 
  ?>
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
              <a class="nav-link" href="registration.html">Registration <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="donate.html">Donate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="photos.php">Photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sponsors.php">Sponsors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="store.html">Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Admin</a>
            </li>
          </ul>
        </div>
      </nav>

    </div>

    <?php 
      
      $sql3 = $dbh->prepare('SELECT * FROM years ORDER BY year_id DESC LIMIT 1');
      if($sql3->execute()) {
        $row = $sql3->fetch(PDO::FETCH_OBJ);
        $year_number = $row->year_number;
        
      } else{
          //$row=$count->fetchAll();
          print_r($dbo->errorInfo()); 
      }
      $year_number = $year_number . " ANNUAL Southwest Ontario Heart & Stroke";
    ?>
    <div class="row">
      <div  class="container-fluid b-g">
        <h1 class="h1bg"><?php echo $year_number ?></h1>
        <div class="textBg">
          <a><img class="golflogo"
            src="images/ddsm-logo.png"
            alt="ddsm-logo"
            width="200"
            height="120"/></a>
            <div class="row">
              <div class="col-md-12 text-center">
                <p class="animate-charcter"> Dan D Segin Memorial Golf for Heart Tournament</p>
              </div>
            </div>
            <div>
              <div class="content">
                <div class="customBtn-registration">
                <a href="/registration" class="customBtn btn--registration">Register</a>
                </div>
              </div>
            </div>
          </div>  
          
        </div>
      </div>    
    </div>
          
   
    <div class="justify-content-md-center mt-5">

      <div class="row justify-content-md-center">
        <div class="col ">
         
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5" >
          <div class="card shadow bg-white border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body">
              <img class="iconCustom"
                src="images/icons/support_heart_and_stroke.png"
                alt="Girl in a jacket"
                width="80"
                height="60"    
              />
              <br>
              <h4 class="card-title">Support Heart and Stroke &rarr;</h4>
              <br>
              <h5 class="card-text"> Make a Donation Today!</h5>
              <br>
              <a href="donate.html" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5">
          <div class="card shadow bg-white  border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body" style="border:3px solid black;">
              <img class="iconCustom"
                src="images/icons/virtual_silent_auction.png"
                alt="Girl in a jacket"
                width="80"
                height="60"
              />
            
              <h4 class="card-title">Virtual Silent Auction &rarr;</h4>
              <h5 class="card-text">Work in Process.</h5>
                <br>
                <a href="#" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col">
       
        </div>
      </div>


      <div class="row justify-content-md-center">
        <div class="col ">
      
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5" >
          <div class="card shadow bg-white  border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body" style="border:3px solid black;">
              <img class="iconCustom"
                src="images/icons/scheduled_tee_times.png"
                alt="Girl in a jacket"
                width="80"
                height="60"
                
              />
              <h4 class="card-title">Schedule &rarr;</h4>
              <br>
              <h5 class="card-text">12:00 PM SHOTGUN START</h5>
              <h6 class="card-text">Saturday June 4th 2022</h6>
                <a href="registration.html" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5">
          <div class="card shadow bg-white  border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body" style="border:3px solid black;">
              <img class="iconCustom"
                src="images/icons/raffle.png"
                alt="Girl in a jacket"
                width="80"
                height="60"
              />
            
              <h4 class="card-title">Raffle Prizes Day &rarr;</h4>
              <h5 class="card-text">For More Information Please Click on the Button Bellow.</h5>
                <br>
                <a href="registration.html" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col">
      
        </div>
      </div>



      <div class="row justify-content-md-center">
        <div class="col ">
        
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5" >
          <div class="card shadow bg-white  border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body" style="border:3px solid black;">
              <img class="iconCustom"
                src="images/icons/dinner_or_lunch.png"
                alt="Girl in a jacket"
                width="80"
                height="60"
                
              />
              <br>
              <h4 class="card-title">Dinner &rarr;</h4>
              <br>
              <h5 class="card-text">BBQ Banquet Dinner</h5>
                <br>
                <a href="registration.html" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col-lg-auto d-flex justify-content-center mt-5">
          <div class="card shadow bg-white  border border-dark" style="width: 23rem; height: 20rem;">
            <div class="card-body" style="border:3px solid black;">
              <img class="iconCustom"
                src="images/icons/corporate_sponsorships.png"
                alt="Girl in a jacket"
                width="80"
                height="60"
              />
            
              <h4 class="card-title">Corporate Sponsorships &rarr;</h4>
              <h5 class="card-text">Thank You for Your Contribution</h5>
              <h6 class="card-text">Toward a Great Cause !</h6>
                <br>
                <a href="sponsors.html" class="btn btn-dark btn-lg hoverButton" style="background:black;"> Click Me</a>
            </div>
          </div>
        </div>
        <div class="col">
       
        </div>
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
                    <a href="https://twitter.com/ddseginmemorialgolf?fbclid=IwAR1F73OqjgrOe_vMIIadhpUg82PvI5_XivgaN6U-w1LWB27fTJ3hmgEcYvI"><img src="images/icons/twitter.png" alt="Twitter" width="60" height="60"/></a>
                    <br/>
                                        
                </figure>
            </div>
        </div>
      </div>  
      <div class="row justify-content-md-center">
    </footer>
       
        

 
    </body>
</html>

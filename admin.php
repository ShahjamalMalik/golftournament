

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
    <div class="aboutPage">
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
                  echo '<li class="nav-item">';
                  echo  '<a class="nav-link" href="admin.php">Admin</a>';
                  echo '</li>';
                ?>
              </ul>
            </div>
          </nav>
    </div>
 
     <!-- Admin Page -->
    <div class="d-flex justify-content-center mt-5 mb-5">
      <div class="card" style="width: 52rem;">
        <div class="card-header">
          <h3>ADMIN</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <form action="server/addPicture.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group" style="background-color: white;">
                    <h5>Select Image Files to Upload:</h5>
                  </div>
                  <div class="form-group" style="background-color: white;">
                    <input type="file" name="files[]" multiple >
                  </div>
                  <div class="form-group mt-5" style="background-color: white;">
                    <input type="submit" class="btn btn-success" name="submit" value="UPLOAD">
                  </div>
            </form>
          </li>
          <li class="list-group-item">
            <form action="server/yearChange.php" method="POST" enctype="multipart/form-data">
              <div class="form-group" style="background-color: white;">
                <h5><label for="selectYear">Select year you would like to change to: </label></h5>
                <select class="form-control mb-5" name="selectYear" id="selectYear">
                  <option value="9TH">9TH</option>
                  <option value="10TH">10TH</option>
                  <option value="11TH">11TH</option>
                  <option value="12TH">12TH</option>
                  <option value="13TH">13TH</option>
                  <option value="14TH">14TH</option>
                  <option value="15TH">15TH</option>
                  <option value="16TH">16TH</option>
                  <option value="17TH">17TH</option>
                  <option value="18TH">18TH</option>
                  <option value="19TH">19TH</option>
                  <option value="20TH">20TH</option>
                  <option value="21ST">21ST</option>
                </select>
                <input type="submit"class="btn btn-success" name="submit">
              </div>
            </form>
          </li>
          <li class="list-group-item">
            <form action="server/addSponsor.php" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="background-color: white;">
                  <h5><label for="sponsor">Sponsor Name: </label></h5>
                  <input required type="text" name="sponsor" id="sponsor">
                </div>
                <div class="form-group" style="background-color: white;">
                  <h5><label for="sponsorDescription">Sponsor Description: </label></h5>
                  <input type="text" name="sponsorDescription" id="sponsorDescription">
                </div>
                <div class="form-group" style="background-color: white;">
                  <h5><label for="sponsorWebsite">Sponsor Website Link: </label></h5>
                  <input type="url" name="sponsorWebsite" id="sponsorWebsite">
                </div>
                <div class="form-group" style="background-color: white;">
                  <h5><label for="sponsorLogo">Upload Sponsor Logo: </label></h5>
                  <input type="file" name="sponsorLogo" id="sponsorLogo">
                </div>
                <input type="submit"class="btn btn-success" name="submit">
              </form>
          </li>
          <li class="list-group-item">
            <form action="server/logout.php" method="POST" enctype="multipart/form-data">
              <input type="submit"class="btn btn-success" value="Logout" name="submit">
            </form>
          </li>
        </ul>
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
    </div>

 
  </body>
</html>



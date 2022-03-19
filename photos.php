

<!DOCTYPE html>
<html lang="en">
  <?php
    include_once 'server/connect.php'; 
  ?>
	<head>
		<meta charset ="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<title></title>
		
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
                      <a class="nav-link" href="registration.html">Registration <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="donate.html">Donate</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="photos.php">Photos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="sponsors.html">Sponsors</a>
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
        <div class="container">
          <?php 
            $path;
            $counter = 0;
            $admin = true;
            
            if($admin) {
              $hidden="";
            } else {
              $hidden="hidden";
            }
            
            $stmt = $dbh->query("SELECT * FROM images");
            while($row = $stmt->fetch()) {//while there's still rows to fetch (images)
              if($counter % 3 == 0) {//Do a check to see if the counter when divided by 3 (starting at 0 will be 0)
                if($counter == 0) {//If the actual counter is 0, create a row because it'll be the first one
                  echo '<div class="row">';
                  $path = $row['picture_path'];
                  $id = $row['picture_id'];
                  echo '<div class="col-sm" style="margin:25px;border:2px solid black;">';
                  echo '<img src="'.$path.'" style="margin:5px;" class="img-fluid" alt="Responsive image" id="'.$id.'">';
                  echo '<div class="form-group">';
                    echo '<form method="POST" action="server/deletePicture.php" style="text-align:center" '.$hidden.'>';
                      echo '<button name="delete" value="'.$id.'"> Delete Photo </button>';
                    echo '</form>';
                  echo '</div>';
                  echo '</div>';
                  
                  
                    
                  $counter += 1;
                  continue;
                } else {//if the counter modulo 3 is 0 and the counter does not equal 0, close the row, and insert a new row
                  
                  echo '</div>';
                  echo '<div class="row">';
                  echo $id;
                  $path = $row['picture_path'];
                  $id = $row['picture_id'];
                  echo '<div class="col-sm" style="margin:25px;border:2px solid black;">';
                  echo '<img src="'.$path.'" style="margin:5px;" class="img-fluid" alt="Responsive image" id="'.$id.'">';
                  echo '<div class="form-group">';
                    echo '<form method="POST" action="server/deletePicture.php" style="text-align:center" '.$hidden.'>';
                      echo '<button name="delete" value="'.$id.'"> Delete Photo </button>';
                    echo '</form>';
                  echo '</div>';
                  echo '</div>';
                  $counter += 1;
                  continue;
                }
              } else {
                  
                  $path = $row['picture_path'];
                  $id = $row['picture_id'];
                  echo '<div class="col-sm" style="margin:25px;border:2px solid black;">';
                  echo '<img src="'.$path.'" style="margin:5px;" class="img-fluid" alt="Responsive image" id="'.$id.'">';
                  echo '<div class="form-group">';
                  echo '<form method="POST" action="server/deletePicture.php" style="text-align:center" '.$hidden.'>';
                      echo '<button name="delete" value="'.$id.'"> Delete Photo </button>';
                    echo '</form>';
                  echo '</div>';
                  echo '</div>';
                  $counter += 1;
                  continue;
              }
              
            }
            
            
          ?> 
        </div>
            
            
            
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

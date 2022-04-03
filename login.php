<?php
  /**
   * login.php is the login page for the admin
   * start the session so we can access our session variables that are active in the session
   */
  session_start();
  /**
   * If the session variable 'id' exists, check if it equals 1 (logged in as admin) to make sure the admin link on the navbar is visible, if not set it to hidden
   */ 
  if($_SESSION['id'] == 1) {
    $_SESSION['adminHide'] = '';
    
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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		
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
 
     <!-- Admin Page -->
    <div class="d-flex justify-content-center mt-5 mb-5">
      <div class="card" style="width: 52rem;">
        <div class="card-header">
          <h3>LOGIN</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          <?php 
            echo '<h3 '.$_SESSION['adminHide'].' >You already logged in </h3>';

          ?>
          <form action="server/login.php" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="background-color: white;">
                  <h5><label for="adminEmail">Email: </label></h5>
                  <input type="email" name="adminEmail" id="adminEmail">
                  
                </div>
                <div class="form-group" style="background-color: white;">
                  <h5><label for="adminPassword">Password: </label></h5>
                  <input type="password" name="adminPassword" id="adminPassword">
                  
                </div>
                <div id="errorMessage"></div>
                <input id="submit" type="submit"class="btn btn-success" name="submit">
              </form>
          </li>
        </ul>
      </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var adminEmail = $("#adminEmail").val();
                var adminPassword = $("#adminPassword").val();
                var dataString = 'adminEmail='+ adminEmail + '&adminPassword='+ adminPassword;
                if(adminEmail=='' || adminPassword=='') {
                    if(adminEmail == '' && adminPassword=='') {
                        $("#errorMessage").html("Please Fill Password And Email");
                    } else {
                        if(adminEmail=='') {
                            $("#errorMessage").html("Please Fill Email");
                        } else {
                            $("#errorMessage").html("");
                            if(adminPassword=='') {
                                $("#errorMessage").html("Please Fill Password");
                            } else {
                                $("#errorMessage").html("");
                            }
                        }

                    }

                }
                else {
                    $.ajax({
                    type: "POST",
                    url: "server/login.php",
                    data: dataString,
                    dataType: "JSON",
                    cache: false,
                    success: function(json){
                        
                        if(json[0]) {
                          if(json[0] == "SUCCESS"){
                            $("#errorMessage").html("Logged in successfully");
                            window.location = "index.php"
                          }else{
                            $("#errorMessage").html(json[0]);
                          }
                        } else {
                            $("#errorMessage").html('');
                        }
                    }
                    });
                }
                return false;
            });
        });
    </script>


    <!-- FOOTER -->
    <footer class="customFooter"  style="margin-top: 30em;">
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
    </div>

 
  </body>
</html>

<?php

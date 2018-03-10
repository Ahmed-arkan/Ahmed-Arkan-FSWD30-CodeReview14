
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>E V E N T S </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <meta http-equiv="refresh" content="index.php">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
a{
  font-size: 18px;
}

span{
  font-size: 22px;
}
.myb{

  padding: 10px 20px 10px 20px;
  margin-left: 20px;
}
</style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <!-- navbar links when signed in -->
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['user'])) { ?> 

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
         

          <li class="nav-item">
                    <div class="dropdown">
                <div class="nav-link dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Event's Type
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php
                  echo '<a class="dropdown-item" href="index.php">All Events</a>';
                 echo '<a class="dropdown-item" href="singlepage2.php?id=Concert">Concert</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Art">Art</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Festival">Festival</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Sport">Sport</a>';
                  ?>
                  
                </div>
              </div>
          </li>
  

        </ul>
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="#">Hi, 
              <?php echo $userRow['name']; ?> <i class="far fa-user"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="create.php"><button type="button" class="btn btn-outline-success"> Create New Event </button></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-outline-danger"> Sign Out </button></a>
          </li>
        

        <!-- navbar links when signed out -->

        <?php } else { ?>    

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
         

            <li class="nav-item">
               <div class="dropdown">
                <div class="nav-link dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Event's Type
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php
                  echo '<a class="dropdown-item" href="index.php">All Events</a>';
                 echo '<a class="dropdown-item" href="singlepage2.php?id=Concert">Concert</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Art">Art</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Festival">Festival</a>';
                  echo '<a class="dropdown-item" href="singlepage2.php?id=Sport">Sport</a>';
                  ?>
                  
                </div>
              </div>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>

        
        <?php } ?>
        
      </ul>
    </div>

  </nav>

  <div class="container-fluid" id="all_container" style="margin-top: 5em;">
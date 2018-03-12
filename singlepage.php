
<?php
$id = $_GET['id'];

?>


<?php
  ob_start();
  session_start();
    include_once 'actions/db_connect.php';

    if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD =$userRow['delete'];

}else{
 $query = "SELECT * FROM admin WHERE id=1";
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD =0;
};


  $filter = "all";

  $query1 = "SELECT * FROM event WHERE id=".$id;
  $res1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_assoc($res1);
  $userID1 = $row1['id'];


  ?>




<!-- Navbar (sit on top) -->

<?php include('navbar.php'); ?>

<!-- Header -->

<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src='<?php echo $row1["header_img"]; ?>' alt="Hamburger Catering" width="1600" height="600">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxxlarge" style="color: red; background-color: black"><?php echo $row1["name"]; ?></h1>
  </div>
</header>
<br>

   
<!-- Page content -->
<center><h1>- <?php echo $row1["name"]; ?> - </h1></center>
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src='<?php echo $row1["image"]; ?>' class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>
          <h1 class="w3-center">- About Event -</h1>
      <h2 class="w3-center" style="color: red;"><?php echo $row1["type"]; ?></h2>
<center class="w3-xlarge">
      <span class="w3-center" style="color: red;">S T A R T :</span> <span>  <?php echo $row1["start_date"]; ?> </span> <br>
      <span class="w3-center" style="color: red;">E N D :</span><span> <?php echo $row1["end_date"]; ?> </span>

    </center>
      <center class="w3-xlarge" style="color: red;">D e s c r i p t i o n</center>
      <h1 class="w3-xlarge"><?php echo $row1["description"]; ?></h1>

    </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">- Contact -</h1><br>
      <h4>- Email</h4>
      <h5 class="w3-text-grey"><?php echo $row1["contact_email"]; ?></h5><br>
    
      <h4>- Phone</h4>
      <h5 class="w3-text-grey"><?php echo $row1["contact_phone"]; ?></h5><br>
    
      <h4>- Address</h4>
      <h5 class="w3-text-grey"><?php echo $row1["address"]; ?></h5><br>
      <h5 class="w3-text-grey"><?php echo $row1["city"]; ?></h5><br>
    
      <h4>- Event Website</h4>
      <a type="link" href='<?php echo $row1["url"]; ?>' class="w3-text-grey" ><h5><?php echo $row1["url"]; ?></h5></a>  <br>  <br> <br> <br> <br>
     <center>
      <?php
      if ($userD == 1) {
      
echo' <h5 class="w3-text-grey"><a href="update.php?id='.$row1['id'].'"><button type="button" class="btn btn-info myb">Edit The Event</button></a>

 <a href="delete.php?id='.$row1["id"].'"><button type="button" class="btn btn-danger myb">Delete</button></a></h5>
    </div>';
    }else{

echo' <h5 class="w3-text-grey"><a href="#"><button type="button" class="btn "></button></a></h5>
    </div>';

    }
    ?>
    </center> 
    
    <div class="w3-col l6 w3-padding-large">
      <img src="<?php echo $row1["header_img"]; ?>" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
    <div class="w3-col l6 w3-padding-large">
      <?php echo $row1["map"]; ?>
    </div>
  </div>

  <hr>
  
<!-- End page content -->
</div>



 <!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>
 

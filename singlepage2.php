
<?php
$id = '"'.$_GET['id'].'"';

?>å


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
  $userD = $userRow['delete'];

}else{
 $query = "SELECT * FROM admin WHERE id=1";
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD =0;
}




  $filter = "all";

  $query1 = "SELECT * FROM event WHERE id=".$id;
  $res1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_assoc($res1);
  $userID1 = $row1['id'];

   $query2 = "SELECT * FROM event ";

  $res2 = mysqli_query($conn, $query2);
  $row2 = mysqli_fetch_assoc($res2);
  $type = '"'.$row2["type"].'"';


  ?>

<style type="text/css">
    
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    min-height: 680px;
    margin-bottom: 60px;
    text-align: center;
}.card img {

    max-height: 300px;

}.card button{

    margin-bottom: 10px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}

.btn-info{

float: left;
margin-left: 40px;

}
.btn-danger{
  float: right;
  margin-right: 40px;
}
.titel{
  font-size: 50px;
  border-bottom: 2px solid black;
}
.titel1{
  font-size: 50px;
  line-height: 2px;
}
</style>

<!-- HTML================================= -->
<?php include('navbar.php'); ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slider1.jpg" alt="First slide" style="max-height: 480px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slider2.png" alt="Second slide" style="max-height: 480px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slider3.jpg" alt="Third slide" style="max-height: 480px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>

<center>

<span class="titel"><br><span class="titel1"><?php echo $id; ?><br></span>
  <br>
</span>

</center>
<br>

<div class="container">    
  <div class="row">



            <?php

            $sql = "SELECT * FROM event WHERE type =".$id;

            $result = $conn->query($sql);

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    if ($userD == 1) {
                   
               echo '
                      <div class="col-sm-4">
                           <div class="card">
                              <img src="'.$row["image"].'" alt="Avatar">
                              <div class="container1">
                              <br>';
                            echo ' <a href="singlepage.php?id='.$row["id"].' "> ';

                             echo '   <h4><b> - '.$row["name"].' - </b></h4> 

                               </a>
                              
                              <hr>
                                <h5 class="address">'.$row["address"].'</h5>
                                <hr>
                                 <span>From :'.$row["start_date"].'</span> <br> <span> To : '.$row["end_date"].'</span> 
                                 <hr>

                                <a href="update.php?id='.$row["id"].'"><button type="button" class="btn btn-info">Edit</button></a>

                                 <a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-danger">Delete</button></a>

                                 <br>
                              </div>
                     </div>
                    </div>';

                }else{


                    echo '
                       <div class="col-sm-4">
                           <div class="card">
                              <img src="'.$row["image"].'" alt="Avatar">
                              <div class="container1">
                              <br>';
                            echo ' <a href="singlepage.php?id='.$row["id"].' "> ';

                             echo '   <h4><b> - '.$row["name"].' - </b></h4> 

                               </a>
                              
                              <hr>
                                <h5 class="address">'.$row["address"].'</h5>
                                <hr>
                                 <span>'.$row["start_date"].'</span> / <span>'.$row["end_date"].'</span> 
                                 <hr>
                              </div>
                     </div>
                    </div>';
                   
            }
 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>

     </div>
</div>



<br><br>
<hr>

<!-- Header -->


  <hr>
  
<!-- End page content -->
</div>


 <!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>
 
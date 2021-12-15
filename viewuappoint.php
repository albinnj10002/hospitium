<?php
session_start();
include 'db_connect.php';
include 'uheader.php';
 if(isset($_SESSION['l_id']))
{
  $l_id=$_SESSION['l_id'];
  //var_dump($l_id);
}
$s="SELECT * FROM user WHERE ul_id=$l_id";
//var_dump($s);
    if(!$stmt=mysqli_query($con,$s))
    {
      die("prepare statement error1");
    }
    $result=mysqli_fetch_array($stmt);
    $gender=$result['u_gender'];

  ?>
    <!--/w3l-services2-->
  <div class="w3l-services2 py-5">
    <div class="container py-xl-5 py-3">
      <div class="title-content">
        <!-- <h6 class="sub-titlehny">Some More Features</h6> -->
        <h3 class="hny-title">Hospitals Appointment</h3>
        <div class="separatorhny"></div>
      </div>




       <!--  <div>

        <form method="post">
          <input type="search" class="form-control" name="search" placeholder="Hospital Name">
          <input type="search" class="form-control" name="search1" placeholder="Near Place">
          <button class="btn btn-style btn-primary" type="submit" name="submit">Search</button>
        </form>
      </div> -->
      <div class="row features mt-4">
        <?php

$s="SELECT * FROM appoinment WHERE apl_id=$l_id";
//var_dump($s);
      if(!$stmt=mysqli_query($con,$s))
      {
        die("Preparestatment error");
      }
      $d=array();
      while ($row=mysqli_fetch_array($stmt))
       {
        $d[]=$row;
  $ap_id=$row['ap_id'];
  $apl_id=$row['apl_id'];

  // $subject=$row['subject'];
  $fname=$row['ap_fname'];

  $phone=$row['ap_phone'];
  $age=$row['ap_age'];
   

   $date=$row['ap_date'];
   $hospital=$row['ap_hospital'];

  $spec=$row['ap_spec'];
  $book=$row['ap_book'];

 


  //$approve=$row['l_approve'];


                                ?>
    
     
        <div class="col-lg-4 col-md-6 feature-grid">
          <a href="#url">
          </a>
          <div class="feature-body service3"><a href="#url">

            </a>
            <div class="feature-info mt-4"><a href="#url">
                <h3 class="feature-titel mb-2"><?php echo $fname;?></h3>
                <!-- <p class="feature-text">Name : <?php echo $name;?></p> -->

                
                <!-- <p class="feature-text">Password : <?php echo $password;?></p> -->
                <p class="feature-text">Phone : <?php echo $phone;?></p>
               <p class="feature-text">Book Date: <?php echo $date;?></p>
                <p class="feature-text">age : <?php echo $age;?></p> 
                <p class="feature-text">Gender : <?php echo $gender;?></p> 

                <p class="feature-text">Specialization : <?php echo $spec;?></p>
                <p class="feature-text">Hospital : <?php echo $hospital;?></p>
                <p class="feature-text">Status : <?php echo $book;?></p>


                            

          
                
              <div class="buttons mt-5">
            
          
          <a href="deleteappo.php?ap_id=<?php echo $ap_id;?>" class="btn btn-primary">Delete</a>
        </div>
            </div>
          </div>

        </div>
        <?php
                             }
                             ?>
      
      
       
      </div>
    </div>
  </div>
  <!--//w3l-services2-->
  <?php
include 'footer.php';
?>
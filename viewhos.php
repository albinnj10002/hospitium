<?php
session_start();
include 'db_connect.php';
include 'uheader.php';
 if(isset($_SESSION['l_id']))
{
  $l_id=$_SESSION['l_id'];
  //var_dump($l_id);
}
$search='';
$search1='';
if(isset($_POST['submit']))
{
$search = $_POST['search'];
$search1 = $_POST['search1'];
}

  ?>
    <!--/w3l-services2-->
  <div class="w3l-services2 py-5">
    <div class="container py-xl-5 py-3">
      <div class="title-content">
        <!-- <h6 class="sub-titlehny">Some More Features</h6> -->
        <h3 class="hny-title">Hospitals</h3>
        <div class="separatorhny"></div>
      </div>


<section class="w3l-subscribe-content py-5">
    <div class="container py-md-4 py-3 text-center">
      <div class="row my-lg-4 mt-4">
        <div class="col-lg-9 col-md-10 mx-auto">
          <div class="subscribe mx-auto">
        
            <form action="#" method="post" class="subscribe-wthree pt-2 mt-5">
              <div class="d-md-flex flex-wrap subscribe-wthree-field">
                <table>
                  <tr>
                <td><input class="form-control" type="text" placeholder="Hospital Name..." name="search" style="font-size: 16px;
  color: var(--title-color);
  border-radius: var(--border-radius);
  padding: 0px 20px;
  height: 60px;
  flex-basis: 70%;
  background: #fff;
  height: 60px;
  padding-left: 20px;
  padding-right: 20px;"></td>
               <td> <input class="form-control" type="text" placeholder="Near By Place..." name="search1" style="font-size: 16px;
  color: var(--title-color);
  border-radius: var(--border-radius);
  padding: 0px 20px;
  height: 60px;
  flex-basis: 70%;
  background: #fff;
  height: 60px;
  padding-left: 20px;
  padding-right: 20px;" ></td>

                <td><button class="btn btn-style btn-primary" type="submit" name="submit">Search</button></td></tr></table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>



       <!--  <div>

        <form method="post">
          <input type="search" class="form-control" name="search" placeholder="Hospital Name">
          <input type="search" class="form-control" name="search1" placeholder="Near Place">
          <button class="btn btn-style btn-primary" type="submit" name="submit">Search</button>
        </form>
      </div> -->
      <div class="row features mt-4">
        <?php

$s="SELECT * FROM faculty WHERE f_hospital LIKE '%$search%' and f_nearplace LIKE '%$search1%'";
//var_dump($s);
      if(!$stmt=mysqli_query($con,$s))
      {
        die("Preparestatment error");
      }
      $d=array();
      while ($row=mysqli_fetch_array($stmt))
       {
        $d[]=$row;
  $f_id=$row['f_id'];
  $fl_id=$row['fl_id'];

  // $subject=$row['subject'];
  $name=$row['f_name'];
 $image=$row['image'];
  $phone=$row['f_phone'];
  $dob=$row['f_dob'];
   

   $email=$row['f_email'];
   $hname=$row['f_hospital'];

  $password=$row['f_password'];
  $address=$row['f_address'];

  $gender=$row['f_gender'];
  $near=$row['f_nearplace'];


  //$approve=$row['l_approve'];


                                ?>
    
     
        <div class="col-lg-4 col-md-6 feature-grid">
          <a href="#url">
          </a>
          <div class="feature-body service3"><a href="#url">

            </a>
            <div class="feature-info mt-4"><a href="#url">
                <h3 class="feature-titel mb-2"><?php echo $hname;?></h3>
                <!-- <p class="feature-text">Name : <?php echo $name;?></p> -->

                <p class="feature-text">Email : <?php echo $email;?></p>
                <!-- <p class="feature-text">Password : <?php echo $password;?></p> -->
                <p class="feature-text">Phone : <?php echo $phone;?></p>
                <!-- <p class="feature-text">DOB : <?php echo $dob;?></p>
                <p class="feature-text">Gender : <?php echo $gender;?></p> -->
                <p class="feature-text">Address : <?php echo $address;?></p>
                <p class="feature-text">Near : <?php echo $near;?></p>

                            

          
                
              <div class="buttons mt-5">
            
          
          <a href="viewufacility.php?afl_id=<?php echo $fl_id;?>" class="btn btn-primary">Facility</a>
        <a href="viewuvaccine.php?vl_id=<?php echo $fl_id;?>" class="btn btn-primary">Vaccine</a>
        <a href="viewudoctor.php?dfl_id=<?php echo $fl_id;?>" class="btn btn-primary">Doctor</a></div>
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
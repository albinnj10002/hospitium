<?php
session_start();
include 'db_connect.php';
include 'uheader.php';
 if(isset($_SESSION['l_id']))
{
  $l_id=$_SESSION['l_id'];
  //var_dump($l_id);
}
$s="SELECT * FROM  user WHERE ul_id=$l_id";
    if(!$stmt=mysqli_query($con,$s))
    {
      die("prepare statement error1");
    }
    $result=mysqli_fetch_array($stmt);

if(isset($_POST['book']))
{
  $fullname=$_POST['fullname'];
  $spec=$_POST['spec'];
  $sdate=$_POST['sdate'];
  $phone=$_POST['phone'];
  $age=$_POST['age'];
  $hospital=$_POST['hospital'];
  $book='book';
  
  

  
 
  $b="INSERT INTO `appoinment`(`apl_id`, `ap_fname`, `ap_phone`, `ap_age`, `ap_date`, `ap_spec`, `ap_hospital`, `ap_book`) VALUES('$l_id','$fullname','$phone','$age','$sdate','$spec','$hospital','$book')";
  var_dump($b);

  if($con->query($b))

  {
    
 
    $_SESSION['msg']="Successfully Register";
    }
  
}

  ?>

<!-- //modal-popup-->
                  <div class="selectpackage">

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              &times;</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Make An Appointment</h4>
                          </div>
                          <div class="modal-body packages">
                            <div class="appointment-form">
                              <form action="#" method="post">
                                <div class="fields-grid">
                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                      <input type="text" name="fullname" placeholder="Full Name" required="">
                                    </div>
                                  </div>
                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                      <input type="text" name="phone" placeholder="Enter Phone Number" required="">
                                    </div>
                                  </div>

                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                      <input type="text" name="age" placeholder="Enter Your Age" required="">
                                    </div>
                                  </div>
                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                      <input type="date" name="sdate" placeholder="Set a Date" required="">
                                    </div>
                                  </div>
                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                      <select id="department" name="spec" required="Specialization">
                                        <option value="">Specialization*</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Heart Surgery">Heart Surgery</option>
                                        <option value="Skin Care">Skin Care</option>
                                        <option value="Body Check-up">Body Check-up</option>
                                        <option value="Numerology">Numerology</option>
                                        <option value="Diagnosis">Diagnosis</option>
                                        <option value="Others">Others</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="styled-input">

                                    <div class="appointment-form-field">

                                    
                                        <?php
           $s1="SELECT f_hospital FROM faculty";
           $stmt=mysqli_query($con,$s1);

    ?>
            <select id="doctor" name="hospital" >
              <option value="">Select Hospital</option>
              <?php
                                    while ($row=mysqli_fetch_assoc($stmt))
           {
                                    ?>
               <option value="<?php echo $row['f_hospital'];?>">
                                       <?php echo $row['f_hospital'];?>
                                    </option>
             
              <?php
                }
              ?>                                    
               </select>



                                    </div>
                                  </div>

                                </div>
                                <div class="appointment-btn text-lg-right">
                                  <button type="submit" name="book" class="btn btn-style btn-primary mt-4">Book Appointment</button>
                                </div><br>
                                 <?php
            if(isset($_SESSION['msg']))
            {
                echo "<div class='alert alert_danger' style='background-color:skyblue';><front color='black'>".$_SESSION['msg']."</font></div>";
                unset($_SESSION['msg']);
            }
            ?>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      $('#myModal').modal('show');
                    </script>
                  </div>
                  <!-- //modal-popup-->


<section class="w3l-ab-features py-5">
    <div class="container py-md-5 py-3">
      <div class="row features-w3pvt-main align-items-center" id="features">
        <div class="col-lg-6 feature-gird pb-lg-5">
          
          <h3 class="hny-title mb-4">User Profile</h3>
          <div class="separatorhny"></div>
          <p class="pr-lg-5">Name : <?php echo $result['u_name'];?></p>
          <p class="pr-lg-5">Email : <?php echo $result['u_email'];?></p>
          <p class="pr-lg-5">Password : <?php echo $result['u_password'];?></p>
          <p class="pr-lg-5">Phone : <?php echo $result['u_phone'];?></p>
          <p class="pr-lg-5">DOB : <?php echo $result['u_dob'];?></p>
          <p class="pr-lg-5">Gender : <?php echo $result['u_gender'];?></p>
          <p class="pr-lg-5">Address : <?php echo $result['u_address'];?></p>

          <div class="buttons mt-5">
            <a href="uedit.php?ul_id=<?php echo $l_id;?>" class="btn btn-style btn-primary">Edit</a>
            <a href="udelete.php?ul_id=<?php echo $l_id;?>" class="btn btn-style btn-primary">Delete</a>
            <a href="uchangepassword.php" class="btn btn-style btn-primary">Change password</a>
            
          </div>
        </div>
        <div class="col-lg-6 feature-gird pr-lg-5 mt-md-0 mt-4 pb-lg-5">
          <img src="assets/images/5.jpg" alt="" class="img-fluid" />
        </div>
       

      </div>
    </div>
  </section>
  <?php
include 'footer.php';
?>
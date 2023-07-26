<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";

if (isset($_POST['submit'])) {
    

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $uid=date("Y-m-d_H:i:s");
    $filename = date("Y-m-d-H-i-s").$_FILES["img"]["name"]; 
    $tempname = $_FILES["img"]["tmp_name"];     
    $folder = "logo/".$filename;
    $allowed = array('gif', 'png', 'jpg','jpeg');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed)) {
            
            if (move_uploaded_file($tempname, $folder)) {
                $sql=mysqli_query($conn,"UPDATE admin SET name='$name',email='$email',contact='$contact',address='$street',city='$city',zip='$zip',state='$state',country='$country',logo='$filename' WHERE id='$user_id'");
                if ($sql==true) {
                    $success="Profile Updated";
                }else{
                    $error="Error: " . $sql . "<br>" . $conn->error;
                }
            }
       
        
            
    }else{
            
        $sql=mysqli_query($conn,"UPDATE admin SET name='$name',email='$email',contact='$contact',address='$street',city='$city',zip='$zip',state='$state',country='$country' WHERE id='$user_id'");
            if ($sql==true) {
                $success="Profile Updated";
            }else{
                $error="Error: " . $sql . "<br>" . $conn->error;
            }
    }


     
}
$admin=mysqli_query($conn,"SELECT * FROM admin");
$result=mysqli_fetch_array($admin); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    <?php include_once("includes/topbar.php");?>

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
        <?php include_once("includes/sidenav.php");?>
        
         <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mt-4">
                        <?php 
                            if ($success!="") {

                        ?>        
                                <div class="alert alert-success mt-4 " role="alert" id="alert">
                                    
                                    <strong>Success! </strong><?php echo $success;?>
                                </div> 
                        <?php        
                                
                                $success="";
                            }elseif ($error!="") {
                        ?>        
                                <div class="alert alert-danger mt-4" role="alert" id="alert">
                                    
                                    <strong>Error! </strong><?php echo $error;?>

                                </div> 
                        <?php  
                               
                                $error="";      
                            }
                        ?>
                        <div class="col-lg-12 col-12 layout-spacing" >
                            
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Company Profile</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                       
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12 mt-4">
                                                <h5>General Info:</h5>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name'];?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <label>Email:</label>
                                                <input type="email" class="form-control" id="name" name="email" value="<?php echo $result['email'];?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <label>Phone:</label>
                                                <input type="text" class="form-control" id="" name="contact" value="<?php echo $result['contact'];?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <label>Logo:</label>
                                                <input type="file" class="form-control-file" id="img" name="img" >
                                            </div>
                                          
                                            <hr>

                                            <div class="form-group col-md-12 mt-4">
                                                <h5>Address:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                 <label>Street:</label>
                                                <input type="text" class="form-control" id="" name="street" value="<?php echo $result['address'];?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                 <label>City:</label>
                                                <input type="text" class="form-control" id="" name="city" value="<?php echo $result['city'];?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                 <label>State:</label>
                                                <input type="text" class="form-control" id="" name="state" value="<?php echo $result['state'];?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                 <label>Zip:</label>
                                                <input type="text" class="form-control" id="" name="zip" value="<?php echo $result['zip'];?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <label>Country:</label>
                                                <input type="text" class="form-control" id="" name="country" value="<?php echo $result['country'];?>" required>
                                            </div>


                                             <hr>

                                              <hr>
                                                                                      
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Submit</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
            </div>
            <?php include_once ("includes/footer.php"); ?>

        </div>
        <!--  END CONTENT PART  -->
        

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script >
       
        $(document).ready(function() {
            $('.select2').select2();
        });
       setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    
</body>
</html>
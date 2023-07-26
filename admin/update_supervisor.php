<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$id=$_GET['id'];


if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $altphone=$_POST['altphone'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $country=$_POST['country'];


    $sql=mysqli_query($conn,"UPDATE supervisor SET name='$name',email='$email',password='$password',contact='$phone',alt_contact='$altphone',street='$address',city='$city',state='$state',zip='$zip',country='$country' WHERE id='$id'");
    if ($sql==true) {
         $success="Supervisor Updated";
    }else{
        $error="Error: " . $sql . "<br>" . $conn->error;
    }

     
}

$supervisor=mysqli_query($conn,"SELECT * FROM supervisor WHERE id='$id'");
$supervisorData=mysqli_fetch_array($supervisor);


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
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mt-4">
                        <?php 
                            if ($success!="") {

                        ?>        
                                <div class="alert alert-success mb-4 " role="alert" id="alert">
                                    
                                    <strong>Success! </strong><?php echo $success;?>
                                </div> 
                        <?php        
                            }elseif ($error!="") {
                        ?>        
                                <div class="alert alert-danger mb-4" role="alert">
                                    
                                    <strong>Error! </strong><?php echo $error;?>
                                </div> 
                        <?php         
                            }
                        ?>
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Edit Supervisor</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Personal Details:</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $supervisorData['name']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $supervisorData['email']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Password:</label>
                                                <input type="password" class="form-control" id="" name="password" value="<?php echo $supervisorData['password']?>" required>
                                            </div>
                                              <div class="form-group col-md-4">
                                                <label>Phone:</label>
                                                <input type="phone" class="form-control" id="email" name="phone" value="<?php echo $supervisorData['contact']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Alt Phone:</label>
                                                <input type="phone" class="form-control" id="" name="altphone" value="<?php echo $supervisorData['alt_contact']?>" >
                                            </div>
                                            <hr>

                                           <div class="form-group col-md-12 mt-4">
                                                <h5>Address Details:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <label>Street:</label>
                                                <input type="text" class="form-control" id="" name="address" value="<?php echo $supervisorData['street']?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>City:</label>
                                                <input type="text" class="form-control" id="" name="city" value="<?php echo $supervisorData['city']?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>State:</label>
                                                <input type="text" class="form-control" id="" name="state" value="<?php echo $supervisorData['state']?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Zip:</label>
                                                <input type="text" class="form-control" id="" name="zip" value="<?php echo $supervisorData['zip']?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Country:</label>
                                                <input type="text" class="form-control" id="" name="country" value="<?php echo $supervisorData['country']?>" required>
                                            </div>
                                            
                                             <hr>


                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update Supervisor</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
            </div>
            <?php include_once 'includes/footer.php'; ?>

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
        }, 1000)
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    
</body>
</html>
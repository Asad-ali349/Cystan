<?php

include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$sup=mysqli_query($conn,"SELECT * FROM supervisor WHERE status='1'");

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
    $supervisor=$_POST['supervisor'];

    $sql=mysqli_query($conn,"INSERT INTO employee(name,email,password,contact,alt_contact,street,city,state,zip,country,supervisor_id) VALUES('$name','$email','$password','$phone','$altphone','$address','$city','$state','$zip','$country','$supervisor')");
    if ($sql==true) {
         $success="Employee Added";
    }else{
        $error="Error: " . $sql . "<br>" . $conn->error;
    }     
}

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
                                            <h2>Add Employee</h2>
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
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control select2" name="supervisor" >
                                                    <option class="" value="">Select Supervisor</option>
                                                    <?php
                                                    while ($data=mysqli_fetch_array($sup)) {
                                                    ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="password" class="form-control" id="" name="password" placeholder="Password" required>
                                            </div>
                                              <div class="form-group col-md-4">
                                                <input type="phone" class="form-control" id="email" name="phone" placeholder="Enter Phone" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="phone" class="form-control" id="" name="altphone" placeholder="Enter Alt Phone (Optional)" >
                                            </div>
                                            <hr>

                                           <div class="form-group col-md-12 mt-4">
                                                <h5>Address Details:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="" name="address" placeholder="Street Address" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="city" placeholder="Enter City" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="state" placeholder="Enter State" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="zip" placeholder="ZIP " required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="country" placeholder="Country" required>
                                            </div>
                                            
                                             <hr>


                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Add Employee</button></center>
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
        }, 5000)
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    
</body>
</html>
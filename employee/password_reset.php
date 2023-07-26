<?php 

include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];
$success="";
$error="";
$id=$_SESSION['login_user'];
    if(isset($_POST['submit'])){
      
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];

        $check = "SELECT password FROM employee WHERE id = '$user_id'";
        $result = mysqli_query($conn,$check);
        if($result->num_rows > 0 ){
            $data = $result->fetch_array();
            if($oldpassword == $data['password']){
                $sql=mysqli_query($conn,"UPDATE employee SET password='$newpassword' WHERE id = '$user_id'");
                if ($sql==true) {
                    $success="Password Changed";
                }else{
                    $error="Error: " . $addGroup . "<br>" . $conn->error;
                }
            }
            else{
              $error = "Old Password is incorrect"; 
            }
        }    

      
 
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>
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
             <?php 
                if ($success!="") {

            ?>        
                    <div class="alert alert-success mt-2 " role="alert" id="alert">
                        
                        <strong>Success! </strong><?php echo $success;?>
                    </div> 
            <?php        
                }elseif ($error!="") {
            ?>        
                    <div class="alert alert-danger mt-2" role="alert" id="alert">
                        
                        <strong>Error! </strong><?php echo $error;?>
                    </div> 
            <?php         
                }
            ?>
            <div class="layout-px-spacing mt-4">
                        <div class="col-lg-6 col-sm-12 layout-spacing" >
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Reset Password</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="name" name="oldpassword" placeholder="Enter Previous Password" required>
                                            </div>
                                        </div>

                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="password" name="newpassword" placeholder="Enter New Password" required>
                                            </div>
                                        </div>

                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <input type="Password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter New Password" required>
                                                <span id='message'></span>
                                            </div>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update</button></center>
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
       
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 3000)
        $('#confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
</body>
</html>
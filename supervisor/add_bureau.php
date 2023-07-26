<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];

$success="";
$error="";
if (isset($_POST['submit'])) {
    $name=$_POST['title'];
    $pobox=$_POST['pobox'];
    $address=$_POST['address'];
    $website=$_POST['website'];
    $phone=$_POST['phone'];

    $sql=mysqli_query($conn,"INSERT INTO `bureau`(`title`, `po_box`, `address`, `website`, `phone`) VALUES ('$name','$pobox','$address','$website','$phone')");
    if ($sql==true) {
        $success="Bureau Added";
    }else{
        $error="Error: " . $sql . "<br>" . $conn->error;
    }
           

}
// title price image service_type note




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
                                            <h2>Add Bureau</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" >
                                       
                                        <div class="form-row mb-4">
                                             <!-- <div class="form-group col-md-12 mt-4">
                                                <h5>Services Details:</h5>
                                            </div> -->
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="pobox" placeholder="Enter PO BOX" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="address" placeholder="Enter Address" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="website" placeholder="Enter Url" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="phone" class="form-control" id="" name="phone" placeholder="Enter Contact No." required>
                                            </div>
                                             <hr>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Add Bureau</button></center>
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
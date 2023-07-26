<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$manage_role=$_SESSION['manage_role'];
$manage_by=$_SESSION['manage_by'];

$success="";
$error="";


if (isset($_POST['submit'])) {
    $reason=$_POST['reason'];
    $reason =str_replace("'", "&apos;", $reason);
    $reason=str_replace('"', "&quot;", $reason);
    $recomend=$_POST['sup'];
    // $supervisor_id=$_POST['supervisor_id'];
    if ($manage_role!='0') {
        $sql=mysqli_query($conn,"INSERT INTO `req_change_supervsior`(`ind_id`, `reason`,`recommended_sup_id`) VALUES ('$user_id','$reason','$recomend')");
        if ($sql==true) {
            $success="Requests Sent";
        }else{
            $error="Error: " . $sql . "<br>" . $conn->error;
        }    
    }else{
        $error="No SuperVisor assigned to you";
    }
    
    
           

}

$sup=mysqli_query($conn,"SELECT * FROM supervisor where status='1'");



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
                                <div class="alert alert-danger mb-4" role="alert" id="alert">
                                    
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
                                            <h2>Request To Change Supervisor</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" >
                                       
                                        <div class="form-row mb-4">
                                             <!-- <div class="form-group col-md-12 mt-4">
                                                <h5>Services Details:</h5>
                                            </div> -->
                                            <div class="form-group col-md-12">
                                                <textarea type="text" class="form-control" id="title" rows="10" name="reason" placeholder="Enter reason for change of Supervisor" required></textarea>
                                            </div>
                                           <div class="form-group col-md-6">
                                                <label>Recomend Any Supervisor:</label>
                                                <select class="form-control select2" name="sup" >
                                                <option class="" value="">Select Supervsior</option>
                                                <?php
                                                    while ($data=mysqli_fetch_array($sup)) {
                                                      ?>
                                                <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                <?php        
                                                    }
                                                    ?>
                                            </select>
                                            </div>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Send Request</button></center>
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
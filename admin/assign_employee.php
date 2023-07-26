<?php  
include_once("db/session.php"); 

$user_id=$_SESSION['login_user'];
if (isset($_SESSION['success']) && isset($_SESSION['error'])) {
    $success=$_SESSION['success'];
    $error=$_SESSION['error'];
}else{
    $success="";
    $error="";   
}
$sup=mysqli_query($conn,"SELECT name,id from supervisor WHERE status='1'");
$emp=mysqli_query($conn,"SELECT name,id from employee WHERE status='1'");


if (isset($_POST['submit'])) {
   $emp_id=$_POST['emp_id'];
    $sup_id=$_POST['sup_id']; 
    $addGroup=mysqli_query($conn,"UPDATE employee SET supervisor_id='$sup_id' WHERE id='$emp_id'");

    if($addGroup==TRUE) {
        $success="Employee Assigned";
    }else{
         
        $error="Error: " . $sql . "<br>" . $conn->error;
    }      
}

    
    


?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">


    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
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
                                $_SESSION['success']="";
                                $success="";
                            }elseif ($error!="") {
                        ?>        
                                <div class="alert alert-danger mb-4" role="alert" id="alert">
                                    
                                    <strong>Error! </strong><?php echo $error;?>

                                </div> 
                        <?php  
                                $_SESSION['error']="";
                                $error="";      
                            }
                        ?>

                        <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h3>Assign Employee</h3>
                                        </div>
                                    </div>
                                </div>
                               	<form action="" method="POST" class="mt-5">
                                       
                                    <div class="form-row mb-4">
                                        
                                        <div class="form-group col-md-5">
                                            <select class="form-control select2" name="emp_id" >
                                                <option class="" value="">Select Employee</option>
                                                <?php
                                                    while ($data=mysqli_fetch_array($emp)) {
                                                ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                <?php        
                                                    }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <select class="form-control select2" name="sup_id" >
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
                                        <div class="form-group col-md-2">
                                            <button type="submit" name="submit" class="btn btn-danger" style="height: 45px">Assign Employee</button>
                                        </div>
                                        
                                         <hr>


                                    </div>
                                </form> 
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

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
   
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script type="text/javascript">
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
</body>
</html>